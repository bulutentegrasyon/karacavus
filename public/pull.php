<?php
// One-time deploy helper — delete after use
$secret = 'krc2024deploy';
if (($_GET['key'] ?? '') !== $secret) { http_response_code(403); die('Forbidden'); }

$repoDir = dirname(__DIR__);
echo "<pre>\n";
echo "Repo: $repoDir\n\n";

// Git pull
$out = shell_exec("cd " . escapeshellarg($repoDir) . " && git pull origin master 2>&1");
echo "=== git pull ===\n$out\n";

// Clear caches
$out2 = shell_exec("cd " . escapeshellarg($repoDir) . " && php artisan view:clear 2>&1");
echo "=== view:clear ===\n$out2\n";

$out3 = shell_exec("cd " . escapeshellarg($repoDir) . " && php artisan config:clear 2>&1");
echo "=== config:clear ===\n$out3\n";

if (function_exists('opcache_reset')) { opcache_reset(); echo "opcache reset OK\n"; }

echo "</pre>";
