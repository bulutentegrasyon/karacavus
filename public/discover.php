<?php
if (($_GET['key'] ?? '') !== 'karacavus2026') { http_response_code(403); die('Forbidden'); }

echo "<pre>\n";
echo "=== PATHS ===\n";
echo "__FILE__     : " . __FILE__ . "\n";
echo "__DIR__      : " . __DIR__ . "\n";
echo "dirname(__DIR__): " . dirname(__DIR__) . "\n";
echo "HOME         : " . ($_SERVER['HOME'] ?? getenv('HOME')) . "\n";
echo "\n";

$home = '/home/hafriyatv1swantr';
echo "=== HOME DIZINI ===\n";
foreach (scandir($home) as $f) { if ($f[0] !== '.') echo "  $f\n"; }

echo "\n=== REPOSITORIES ===\n";
$repoDir = $home . '/repositories';
if (is_dir($repoDir)) {
    foreach (scandir($repoDir) as $f) { if ($f[0] !== '.') echo "  $f\n"; }
} else { echo "  (yok)\n"; }

echo "\n=== PUBLIC_HTML ===\n";
foreach (scandir($home . '/public_html') as $f) { if ($f[0] !== '.') echo "  $f\n"; }

echo "\n=== .GIT KONTROLU ===\n";
$paths = [
    $home . '/public_html',
    $home . '/repositories/karacavus',
    $home . '/repositories/hafriyat-karacavus',
    dirname(__DIR__),
];
foreach ($paths as $p) {
    $hasGit = is_dir($p . '/.git') ? 'VAR (.git)' : 'YOK';
    echo "  $p => $hasGit\n";
}

echo "\n=== CPANEL GIT REPO LIST ===\n";
$ch = curl_init("https://hafriyatv1.swantro.co:2083/execute/VersionControl/retrieve_repositories");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_USERPWD => 'hafriyatv1swantr:kY}00]G=)!s]',
]);
$r = json_decode(curl_exec($ch), true);
curl_close($ch);
if (!empty($r['data'])) {
    foreach ($r['data'] as $repo) {
        echo "  repository_root: " . $repo['repository_root'] . "\n";
        echo "  remote: " . ($repo['remote_url'] ?? '-') . "\n\n";
    }
} else {
    echo json_encode($r) . "\n";
}
echo "</pre>";
