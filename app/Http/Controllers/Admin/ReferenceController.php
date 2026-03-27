<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReferenceController extends Controller
{
    const COMPANIES = [
        'Karaçavuş Proje Geliştirme',
        'Asel İnşaat Hafriyat',
        'Ömkar Otomotiv',
        'Nayifoğulları İnşaat',
        'Nayifoğulları YMK Yıkım',
    ];

    public function index(Request $request)
    {
        $company = $request->get('company', '');
        $search  = $request->get('search', '');

        $references = Reference::query()
            ->when($company, fn($q) => $q->where('company', $company))
            ->when($search,  fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->orderBy('company')
            ->orderBy('order')
            ->paginate(25)
            ->withQueryString();

        $counts = [];
        foreach (self::COMPANIES as $c) {
            $counts[$c] = Reference::where('company', $c)->count();
        }

        return view('admin.references.index', compact('references', 'counts', 'company', 'search'));
    }

    public function create()
    {
        return view('admin.references.create', ['companies' => self::COMPANIES]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'work_type'     => 'nullable|string|max:100',
            'quantity'      => 'nullable|string|max:100',
            'status'        => 'required|in:tamamlanan,devam_eden',
            'company'       => 'required|string|max:255',
            'location'      => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'cover_image'   => 'nullable|image|max:8192',
            'gallery.*'     => 'nullable|image|max:8192',
            'youtube_urls'  => 'nullable|string',
            'order'         => 'nullable|integer|min:0',
            'is_active'     => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['slug']      = $this->uniqueSlug($data['name']);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('references', 'public');
        }

        $gallery = $this->buildGallery([], $request);
        if (!empty($gallery)) {
            $data['gallery'] = $gallery;
        }

        unset($data['youtube_urls']);
        Reference::create($data);

        return redirect()->route('admin.references.index')->with('success', 'Referans oluşturuldu.');
    }

    public function edit(Reference $reference)
    {
        return view('admin.references.edit', [
            'reference' => $reference,
            'companies' => self::COMPANIES,
        ]);
    }

    public function update(Request $request, Reference $reference)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'work_type'     => 'nullable|string|max:100',
            'quantity'      => 'nullable|string|max:100',
            'status'        => 'required|in:tamamlanan,devam_eden',
            'company'       => 'required|string|max:255',
            'location'      => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'cover_image'   => 'nullable|image|max:8192',
            'gallery.*'     => 'nullable|image|max:8192',
            'youtube_urls'  => 'nullable|string',
            'gallery_keep'  => 'nullable|array',
            'order'         => 'nullable|integer|min:0',
            'is_active'     => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            if ($reference->cover_image && !str_starts_with($reference->cover_image, 'assets/')) {
                Storage::disk('public')->delete($reference->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('references', 'public');
        }

        // Mevcut gallery'den kaldırılmayanları koru
        $keep    = $request->input('gallery_keep', []);
        $current = $reference->gallery ?? [];
        foreach ($current as $item) {
            if (!in_array($item, $keep) && !str_starts_with($item, 'assets/') && !str_contains($item, 'youtube.com')) {
                Storage::disk('public')->delete($item);
            }
        }
        $kept = array_values(array_filter($current, fn($i) => in_array($i, $keep)));

        $gallery = $this->buildGallery($kept, $request);
        $data['gallery'] = $gallery;

        unset($data['youtube_urls'], $data['gallery_keep']);
        $reference->update($data);

        return redirect()->route('admin.references.index', ['company' => $reference->company])
            ->with('success', 'Referans güncellendi.');
    }

    public function destroy(Reference $reference)
    {
        if ($reference->cover_image && !str_starts_with($reference->cover_image, 'assets/')) {
            Storage::disk('public')->delete($reference->cover_image);
        }
        if ($reference->gallery) {
            foreach ($reference->gallery as $img) {
                if (!str_starts_with($img, 'assets/') && !str_contains($img, 'youtube.com')) {
                    Storage::disk('public')->delete($img);
                }
            }
        }
        $company = $reference->company;
        $reference->delete();

        return redirect()->route('admin.references.index', ['company' => $company])
            ->with('success', 'Referans silindi.');
    }

    private function buildGallery(array $kept, Request $request): array
    {
        $gallery = $kept;

        // YouTube URL'leri ekle
        $ytRaw = trim($request->input('youtube_urls', ''));
        if ($ytRaw) {
            foreach (array_filter(array_map('trim', explode("\n", $ytRaw))) as $url) {
                $embedUrl = $this->toEmbedUrl($url);
                if ($embedUrl && !in_array($embedUrl, $gallery)) {
                    $gallery[] = $embedUrl;
                }
            }
        }

        // Yeni dosyaları ekle
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('references/gallery', 'public');
            }
        }

        return $gallery;
    }

    private function toEmbedUrl(string $url): ?string
    {
        if (str_contains($url, 'youtube.com/embed/')) {
            return $url;
        }
        if (preg_match('/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }
        return null;
    }

    private function uniqueSlug(string $name): string
    {
        $base = Str::slug(Str::limit($name, 60));
        $slug = $base;
        $i    = 1;
        while (Reference::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}
