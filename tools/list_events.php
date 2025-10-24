<?php

// Simple script to list events from PostgreSQL
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $stmt = $pdo->query("SELECT id, title, start_date, end_date, status, created_at FROM events ORDER BY id DESC LIMIT 100");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$rows) {
        echo "No rows in events table\n";
        exit(0);
    }

    foreach ($rows as $r) {
        echo sprintf("%3s | %-30s | %10s | %10s | %-9s | %s\n", $r['id'], substr($r['title'] ?? '', 0, 30), $r['start_date'] ?? '-', $r['end_date'] ?? '-', $r['status'] ?? '-', $r['created_at'] ?? '-');
    }
} catch (Throwable $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
