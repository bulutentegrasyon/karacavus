<?php
/**
 * Deploy helper — git conflict çözücü
 * Kullandıktan sonra SİL: rm public/deploy.php
 */

// Basit güvenlik
if (($_GET['key'] ?? '') !== 'karacavus2026') {
    http_response_code(403);
    die('Forbidden');
}

$base = dirname(__DIR__); // public_html kökü

// ─────────────────────────────────────────────
// Adım 1: Çakışan (modified) dosyaları sil
// Git pull sonrası bunlar repo'dan geri gelecek
// ─────────────────────────────────────────────
$modified = [
    'composer.json',
    'config/adminlte.php',
    'resources/views/frontend/company-detail.blade.php',
    'resources/views/frontend/home.blade.php',
    'routes/web.php',
];

// ─────────────────────────────────────────────
// Adım 2: Untracked (yeni) dosyaları sil
// Git pull sonrası bunlar repo'dan geri gelecek
// ─────────────────────────────────────────────
$untracked = [
    'app/Http/Controllers/Admin/CompanyController.php',
    'app/Http/Controllers/Admin/TestimonialController.php',
    'app/Models/Company.php',
    'app/Models/Reference.php',
    'app/Models/Testimonial.php',
    'database/migrations/2026_03_27_130000_create_testimonials_table.php',
    'database/migrations/2026_03_27_130001_create_companies_table.php',
    'database/seeders/CompanySeeder.php',
    'database/seeders/TestimonialSeeder.php',
    'resources/views/admin/companies/edit.blade.php',
    'resources/views/admin/companies/index.blade.php',
    'resources/views/admin/references/create.blade.php',
    'resources/views/admin/references/edit.blade.php',
    'resources/views/admin/references/index.blade.php',
    'resources/views/admin/testimonials/create.blade.php',
    'resources/views/admin/testimonials/edit.blade.php',
    'resources/views/admin/testimonials/index.blade.php',
    'database/seeders/CompanyReferenceSeeder.php',
    'database/seeders/DatabaseSeeder.php',
];

$allFiles = array_merge($modified, $untracked);

echo "<pre style='font-family:monospace;font-size:13px;'>\n";
echo "=== DEPLOY HELPER ===\n\n";

$deleted = 0;
$failed  = 0;

foreach ($allFiles as $rel) {
    $path = $base . '/' . $rel;
    if (!file_exists($path)) {
        echo "SKIP  (yok)  $rel\n";
        continue;
    }
    if (@unlink($path)) {
        echo "DEL   ✓      $rel\n";
        $deleted++;
    } else {
        echo "FAIL  ✗      $rel\n";
        $failed++;
    }
}

echo "\nSilinen: $deleted  |  Hata: $failed\n";

// ─────────────────────────────────────────────
// Adım 3: cPanel UAPI ile Git Pull
// ─────────────────────────────────────────────
echo "\n=== GIT PULL TETIKLENIYOR ===\n";

$cpUser = 'hafriyatv1swantr';
$cpPass = 'kY}00]G=)!s]';
$cpHost = 'hafriyatv1.swantro.co';
$repoRoot = '/home/' . $cpUser . '/public_html';

$url = "https://{$cpHost}:2083/execute/VersionControl/update";

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_USERPWD        => "$cpUser:$cpPass",
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query(['repository_root' => $repoRoot]),
    CURLOPT_TIMEOUT        => 60,
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlErr  = curl_error($ch);
curl_close($ch);

if ($curlErr) {
    echo "cURL hatası: $curlErr\n";
} else {
    echo "HTTP $httpCode\n";
    $data = json_decode($response, true);
    if (isset($data['data']['task_id'])) {
        echo "Git pull başlatıldı. task_id: " . $data['data']['task_id'] . "\n";
        echo "30 saniye bekleyin, ardından siteyi kontrol edin.\n";
    } elseif (isset($data['errors']) && $data['errors']) {
        echo "Hata: " . implode("\n", $data['errors']) . "\n";
        echo "\nHam yanıt:\n$response\n";
    } else {
        echo "Yanıt:\n$response\n";
    }
}

// ─────────────────────────────────────────────
// Adım 4: Bootstrap cache temizle
// ─────────────────────────────────────────────
echo "\n=== CACHE TEMİZLENİYOR ===\n";

$caches = [
    'bootstrap/cache/routes-v7.php',
    'bootstrap/cache/config.php',
    'bootstrap/cache/packages.php',
    'bootstrap/cache/services.php',
];

foreach ($caches as $c) {
    $p = $base . '/' . $c;
    if (file_exists($p) && unlink($p)) {
        echo "DEL   ✓  $c\n";
    }
}

echo "\n=== TAMAM ===\n";
echo "Bu scripti şimdi silin: deploy.php\n";
echo "</pre>\n";
