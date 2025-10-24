<?php
// Check merchandise rows
$host = '127.0.0.1';
$port = 5432;
$db   = 'cvi_wirotaman';
$user = 'postgres';
$pass = 'postgres';
$dsn = "pgsql:host=$host;port=$port;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    exit(1);
}

try {
    $count = $pdo->query('SELECT COUNT(*) FROM merchandise')->fetchColumn();
    echo "merchandise rows: $count\n";
    if ($count > 0) {
        $stmt = $pdo->query('SELECT id, name, price, status, created_at FROM merchandise ORDER BY created_at DESC LIMIT 5');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "Latest rows:\n";
        foreach ($rows as $r) {
            echo "- {$r['id']} | {$r['name']} | {$r['price']} | {$r['status']} | {$r['created_at']}\n";
        }
    }
} catch (Exception $e) {
    echo "ERROR (query): " . $e->getMessage() . "\n";
}
