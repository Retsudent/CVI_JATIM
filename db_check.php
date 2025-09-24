<?php

declare(strict_types=1);

$dsn = 'pgsql:host=localhost;port=5432;dbname=cvi_wirotaman';
$user = 'postgres';
$pass = 'postgres';

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    $count = 0;
    try {
        $stmt = $pdo->query('SELECT COUNT(*) AS c FROM users');
        $row = $stmt->fetch();
        $count = (int) ($row['c'] ?? 0);
        echo "DB OK. users_count=" . $count . PHP_EOL;
    } catch (Throwable $inner) {
        echo "DB OK, but users table missing or unreadable: " . $inner->getMessage() . PHP_EOL;
    }
    exit(0);
} catch (Throwable $e) {
    echo 'DB ERROR: ' . $e->getMessage() . PHP_EOL;
    exit(1);
}


