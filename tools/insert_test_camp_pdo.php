<?php
$host = 'localhost';
$port = 5432;
$db = 'cvi_wirotaman';
$user = 'postgres';
$pass = 'postgres';
$dsn = "pgsql:host=$host;port=$port;dbname=$db;";
try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = "INSERT INTO campgrounds (name, description, location, price_per_person, capacity_tent, capacity_people, capacity_parking, address, coordinates_lat, coordinates_lng, facilities, contact_info, status, image, created_at, updated_at) VALUES (:name, :description, :location, :price_per_person, :capacity_tent, :capacity_people, :capacity_parking, :address, :coordinates_lat, :coordinates_lng, :facilities, :contact_info, :status, :image, now(), now()) RETURNING id";
    $stmt = $pdo->prepare($sql);
    $params = [
        ':name' => 'PDO TEST CAMP',
        ':description' => 'Inserted via PDO test script',
        ':location' => 'PDOville',
        ':price_per_person' => '20000.00',
        ':capacity_tent' => 20,
        ':capacity_people' => 80,
        ':capacity_parking' => 15,
        ':address' => 'Jl. PDO Test 1',
        ':coordinates_lat' => '-7.9100',
        ':coordinates_lng' => '112.6100',
        ':facilities' => "Toilet\nAir",
        ':contact_info' => 'WA: 628222',
        ':status' => 'active',
        ':image' => ''
    ];
    $stmt->execute($params);
    $id = $stmt->fetchColumn();
    echo "Inserted PDO camp id: $id\n";
    $q = $pdo->prepare("SELECT id, name, capacity_tent, capacity_people, capacity_parking, address, coordinates_lat, coordinates_lng FROM campgrounds WHERE id = :id");
    $q->execute([':id' => $id]);
    $row = $q->fetch(PDO::FETCH_ASSOC);
    print_r($row);
} catch (PDOException $e) {
    echo "DB error: " . $e->getMessage() . "\n";
    exit(1);
}
