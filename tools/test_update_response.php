<?php
// Simple test script to update admin_response for a merchandise review (id configurable)
$id = $argv[1] ?? 12;
$resp = $argv[2] ?? 'Automated test response at ' . date('Y-m-d H:i:s');

try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare('UPDATE merchandise_reviews SET admin_response = :resp, is_approved = true, updated_at = now() WHERE id = :id');
    $stmt->execute([':resp' => $resp, ':id' => $id]);
    echo "Updated rows: " . $stmt->rowCount() . "\n";
    $row = $pdo->query('SELECT id, admin_response, is_approved, updated_at FROM merchandise_reviews WHERE id=' . (int)$id)->fetch(PDO::FETCH_ASSOC);
    print_r($row);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
