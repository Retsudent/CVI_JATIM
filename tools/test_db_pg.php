<?php
// Simple PostgreSQL connection test using PDO
$host = '127.0.0.1';
$port = 5432;
$db   = 'cvi_wirotaman';
$user = 'postgres';
$pass = 'postgres';
$dsn = "pgsql:host=$host;port=$port;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "OK: Connected to PostgreSQL database '$db' on $host:$port\n";
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    exit(1);
}

// Simple query to check tables
try {
    $stmt = $pdo->query("SELECT current_database(), version();");
    $row = $stmt->fetch(PDO::FETCH_NUM);
    echo "Database: " . $row[0] . "\n";
    echo "Server: " . $row[1] . "\n";
} catch (PDOException $e) {
    echo "ERROR (query): " . $e->getMessage() . "\n";
    exit(1);
}

return 0;
