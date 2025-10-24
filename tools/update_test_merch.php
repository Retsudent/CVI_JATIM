<?php
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman','postgres','postgres', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    $id = 6;
    $sql = "UPDATE merchandise SET sizes = :sizes, colors = :colors, specifications = :spec WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':sizes' => 'S, M, L, XL',
        ':colors' => 'Putih, Hitam, Navy',
        ':spec' => "Bahan: Katun 100%\nBerat: 200 gram\nWarna: Putih, Hitam",
        ':id' => $id
    ]);
    echo "Updated merch id: $id\n";
    $sel = $pdo->query("SELECT id, sizes, colors, specifications FROM merchandise WHERE id = " . (int)$id)->fetchAll(PDO::FETCH_ASSOC);
    print_r($sel);
} catch (Throwable $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
}
