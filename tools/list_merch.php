<?php
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT id, name, description FROM merchandise ORDER BY id DESC LIMIT 200");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$rows) {
        echo "No merchandise rows found\n";
        exit(0);
    }
    foreach ($rows as $r) {
        echo sprintf("%3s | %s | %s\n", $r['id'], $r['name'] ?? '', $r['title'] ?? '');
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
