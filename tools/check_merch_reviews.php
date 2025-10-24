<?php
// Quick PDO script to list recent rows in merchandise_reviews
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT id, merchandise_id, customer_name, customer_email, rating, comment, is_approved, admin_response, created_at FROM merchandise_reviews ORDER BY id DESC LIMIT 20");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$rows) {
        echo "No reviews found\n";
        exit(0);
    }
    foreach ($rows as $r) {
        echo sprintf("%3s | merch_id=%s | %-20s | %s | rating=%s | approved=%s | %s\n", $r['id'], $r['merchandise_id'], $r['customer_name'], $r['created_at'], $r['rating'], $r['is_approved'] ? 'true' : 'false', substr($r['comment'],0,60));
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
