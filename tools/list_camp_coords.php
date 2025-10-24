<?php
$host = 'localhost'; $port = 5432; $db = 'cvi_wirotaman'; $user = 'postgres'; $pass = 'postgres';
$dsn = "pgsql:host=$host;port=$port;dbname=$db;";
try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    $sql = "SELECT id, name, coordinates_lat, coordinates_lng, (CASE WHEN column_name IS NOT NULL THEN true ELSE false END) as has_coordinates_column FROM campgrounds LEFT JOIN (SELECT table_name, column_name FROM information_schema.columns WHERE table_name='campgrounds' AND column_name='coordinates') c ON true ORDER BY id";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $r) {
        echo "ID: {$r['id']} | Name: {$r['name']} | lat: " . ($r['coordinates_lat'] ?? 'NULL') . " | lng: " . ($r['coordinates_lng'] ?? 'NULL') . " | has_coordinates_col: " . ($r['has_coordinates_column'] ? 'yes' : 'no') . "\n";
    }
} catch (PDOException $e) {
    echo "DB error: " . $e->getMessage() . "\n";
}
