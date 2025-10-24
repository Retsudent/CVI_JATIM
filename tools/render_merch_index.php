<?php
// Minimal render of merchandise/index view for debugging
$products = [];
try {
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman','postgres','postgres');
    $sth = $db->query('select * from merchandise order by created_at desc');
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $products[] = $row;
    }
} catch (Exception $e) {
    echo "DB error: " . $e->getMessage();
    exit(1);
}

$base = 'http://localhost:8080/';
if (!function_exists('base_url')) {
    function base_url($path = '') {
        global $base;
        return rtrim($base, '/') . '/' . ltrim($path, '/');
    }
}

ob_start();
extract(['products' => $products]);
include __DIR__ . '/../app/Views/merchandise/index.php';
$html = ob_get_clean();
// Print only the lines with 'merchandise/detail' to see generated hrefs
foreach (explode("\n", $html) as $i => $line) {
    if (strpos($line, 'merchandise/detail') !== false) {
        echo trim($line) . "\n";
    }
}
