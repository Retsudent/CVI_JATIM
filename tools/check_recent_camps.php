<?php
$host = 'localhost';
$port = 5432;
$db = 'cvi_wirotaman';
$user = 'postgres';
$pass = 'postgres';
$dsn = "pgsql:host=$host;port=$port;dbname=$db;";
try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $stmt = $pdo->prepare("SELECT id, name, capacity_tent, capacity_people, capacity_parking, address, coordinates_lat, coordinates_lng FROM campgrounds WHERE name ILIKE 'TEST CAMP%'");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($rows)) {
        echo "No TEST CAMP rows found.\n";
        exit(0);
    }
    foreach ($rows as $r) {
        print_r($r);
    }
} catch (PDOException $e) {
    echo "DB error: " . $e->getMessage() . "\n";
    exit(1);
}
