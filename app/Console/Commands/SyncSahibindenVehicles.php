<?php

namespace App\Console\Commands;

use App\Models\Vehicle;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncSahibindenVehicles extends Command
{
    protected $signature   = 'vehicles:sync-sahibinden';
    protected $description = 'Sahibinden ilanlarını kontrol et, satılmış olanları pasife al';

    public function handle(): int
    {
        $vehicles = Vehicle::where('is_active', true)
            ->whereNotNull('sahibinden_url')
            ->get();

        $this->info("Kontrol ediliyor: {$vehicles->count()} araç");
        $deactivated = 0;

        foreach ($vehicles as $vehicle) {
            try {
                $response = Http::timeout(10)
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)'])
                    ->withoutRedirecting()
                    ->head($vehicle->sahibinden_url);

                $code = $response->status();

                // 403 = Cloudflare engeli = ilan aktif
                // 404/410 = ilan kaldırıldı
                // 301/302 = ana sayfaya yönlendirme = ilan yok
                if ($code === 403) {
                    $this->line("  <fg=green>✓</> [{$code}] {$vehicle->name}");
                    continue;
                }

                $vehicle->update(['is_active' => false]);
                $this->line("  <fg=yellow>✗</> [{$code}] {$vehicle->name} → <fg=yellow>pasife alındı</>");
                $deactivated++;

            } catch (\Exception $e) {
                $this->line("  <fg=gray>?</> {$vehicle->name} → bağlantı hatası, atlandı");
            }

            usleep(500000); // 0.5s bekle
        }

        $this->info("Tamamlandı. Pasife alınan: {$deactivated}");

        return self::SUCCESS;
    }
}
