<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SahibindenProxyController extends Controller
{
    /**
     * Sahibinden ilanından og:image URL'ini çekmeye çalış.
     * Cloudflare engeli varsa kullanıcı görseli browser'dan kopyalayabilir.
     */
    public function fetchImage(Request $request)
    {
        $url = $request->input('url');

        if (!$url || !str_contains($url, 'sahibinden.com')) {
            return response()->json(['success' => false, 'message' => 'Geçersiz URL']);
        }

        // Listing ID'yi URL'den çıkar
        preg_match('/-(\d{8,12})\/detay/', $url, $m);
        $listingId = $m[1] ?? null;

        // CDN pattern'lerini dene
        if ($listingId) {
            $cdnPatterns = [
                "https://i.sahibinden.com/sahibindencom-image/large/{$listingId}/1.jpg",
                "https://i.sahibinden.com/sahibindencom-image/medium/{$listingId}/1.jpg",
                "https://i.sahibinden.com/classifiedPhotos/large/{$listingId}_1.jpg",
                "https://i.sahibinden.com/classifiedPhotos/medium/{$listingId}_1.jpg",
            ];

            foreach ($cdnPatterns as $cdnUrl) {
                try {
                    $response = Http::timeout(5)->head($cdnUrl);
                    if ($response->successful()) {
                        return response()->json(['success' => true, 'image_url' => $cdnUrl]);
                    }
                } catch (\Exception $e) {
                    continue;
                }
            }
        }

        // PHP proxy ile sayfa HTML'ini çekmeyi dene
        $agents = [
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
        ];

        foreach ($agents as $agent) {
            try {
                $response = Http::timeout(8)
                    ->withHeaders([
                        'User-Agent'      => $agent,
                        'Accept'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                        'Accept-Language' => 'tr-TR,tr;q=0.9,en;q=0.8',
                        'Referer'         => 'https://www.sahibinden.com/',
                    ])
                    ->get($url);

                if ($response->successful() && preg_match('/<meta property="og:image" content="([^"]+)"/', $response->body(), $match)) {
                    return response()->json(['success' => true, 'image_url' => $match[1]]);
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        return response()->json([
            'success'    => false,
            'listing_id' => $listingId,
            'message'    => 'Cloudflare engeli — görseli manuel yapıştırın.',
        ]);
    }

    /**
     * İlan hâlâ aktif mi kontrol et.
     * Sahibinden: 403 = Cloudflare bot engeli (ilan VAR), 404/410/301 = ilan KALDIRILMIŞ.
     */
    public function checkStatus(Request $request)
    {
        $url = $request->input('url');

        if (!$url) {
            return response()->json(['status' => 'unknown']);
        }

        try {
            $response = Http::timeout(8)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)',
                ])
                ->withoutRedirecting()
                ->head($url);

            $code = $response->status();

            // 403 = Cloudflare aktif = ilan büyük ihtimalle VAR
            // 404, 410, 301/302 (farklı sayfaya) = ilan kaldırılmış
            if ($code === 403) {
                return response()->json(['status' => 'active', 'code' => $code]);
            }

            return response()->json(['status' => 'likely_sold', 'code' => $code]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Tüm araçları kontrol et — satılmış olanları pasife al.
     * Artisan komutu veya admin butonu ile tetiklenir.
     */
    /**
     * Bookmarklet'ten gelen görsel URL'ini geçici cache'e yaz.
     * CORS izni var — sahibinden.com'dan çağrılacak.
     */
    public function receiveImage(Request $request)
    {
        $imageUrl   = $request->input('image_url');
        $listingUrl = $request->input('listing_url');
        $year       = $request->input('year');
        $price      = $request->input('price');
        $km         = $request->input('km');

        if (!$imageUrl) {
            return response()->json(['success' => false], 400)
                ->header('Access-Control-Allow-Origin', '*');
        }

        // 5 dakika boyunca cache'le — admin sayfası polling ile okur
        Cache::put('sahibinden_pending_image', [
            'image_url'   => $imageUrl,
            'listing_url' => $listingUrl,
            'year'        => $year,
            'price'       => $price,
            'km'          => $km,
            'at'          => now()->toISOString(),
        ], 300);

        return response()->json(['success' => true])
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Headers', 'Content-Type');
    }

    /**
     * Admin sayfası bu endpoint'i poll eder — yeni görsel var mı?
     */
    public function pendingImage()
    {
        $data = Cache::pull('sahibinden_pending_image');

        if ($data) {
            return response()->json(['success' => true, 'data' => $data]);
        }

        return response()->json(['success' => false]);
    }

    /**
     * Tüm araçları kontrol et — satılmış olanları pasife al.
     */
    public function syncAll()
    {
        $vehicles = Vehicle::where('is_active', true)->whereNotNull('sahibinden_url')->get();
        $deactivated = [];

        foreach ($vehicles as $vehicle) {
            try {
                $response = Http::timeout(8)
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->withoutRedirecting()
                    ->head($vehicle->sahibinden_url);

                $code = $response->status();

                // 404, 410, ya da sahibinden ana sayfasına yönlendirme (301/302)
                if (in_array($code, [404, 410]) || ($code >= 300 && $code < 400)) {
                    $vehicle->update(['is_active' => false]);
                    $deactivated[] = $vehicle->name;
                }
            } catch (\Exception $e) {
                // Network hatası = ilan muhtemelen hâlâ var, geç
                continue;
            }
        }

        return response()->json([
            'checked'     => $vehicles->count(),
            'deactivated' => count($deactivated),
            'vehicles'    => $deactivated,
        ]);
    }
}
