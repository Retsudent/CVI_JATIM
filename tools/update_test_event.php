<?php
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman','postgres','postgres', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    $id = 18; // event inserted earlier
    $sql = "UPDATE events SET capacity = :capacity, activities = :activities, facilities = :facilities, whatsapp_contact = :wa WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':capacity' => 123,
        ':activities' => "Test activity A\nTest activity B",
        ':facilities' => "Fac A\nFac B",
        ':wa' => '628999888777',
        ':id' => $id
    ]);
    echo "Updated id: $id\n";
    $sel = $pdo->query("SELECT id, capacity, activities, facilities, whatsapp_contact FROM events WHERE id = " . (int)$id)->fetchAll(PDO::FETCH_ASSOC);
    print_r($sel);
} catch (Throwable $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
}
