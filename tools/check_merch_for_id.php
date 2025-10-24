<?php
$id = $argv[1] ?? null;
if (!$id) { echo "Usage: php check_merch_for_id.php <id>\n"; exit(1); }
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare('SELECT id, customer_name, comment, is_approved, admin_response, created_at FROM merchandise_reviews WHERE merchandise_id = :id ORDER BY id DESC LIMIT 50');
    $stmt->execute([':id' => $id]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$rows) { echo "No reviews for merchandise_id=$id\n"; exit(0); }
    foreach ($rows as $r) {
        printf("%3s | %s | approved=%s | %s | admin_resp=%s\n", $r['id'], $r['customer_name'], $r['is_approved'] ? 'true' : 'false', substr($r['comment'],0,60), $r['admin_response'] ? substr($r['admin_response'],0,40) : '');
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
