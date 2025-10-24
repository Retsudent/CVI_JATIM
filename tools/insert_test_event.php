<?php
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman','postgres','postgres', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    $sql = "INSERT INTO events (title, description, location, start_date, end_date, price, status, created_at, updated_at, capacity, whatsapp_contact, activities, facilities) VALUES (:title, :description, :location, :start_date, :end_date, :price, :status, :created_at, :updated_at, :capacity, :whatsapp, :activities, :facilities) RETURNING id";
    $stmt = $pdo->prepare($sql);
    $now = date('Y-m-d H:i:s');
    $stmt->execute([
        ':title' => 'Test Insert Event',
        ':description' => 'Ini adalah event test untuk memverifikasi penyimpanan capacity, activities, facilities.',
        ':location' => 'Wirotaman Test Location',
        ':start_date' => date('Y-m-d', strtotime('+7 days')),
        ':end_date' => date('Y-m-d', strtotime('+8 days')),
        ':price' => 10000,
        ':status' => 'upcoming',
        ':created_at' => $now,
        ':updated_at' => $now,
        ':capacity' => 42,
        ':whatsapp' => '628111222333',
        ':activities' => "Camping\nHiking\nStargazing",
        ':facilities' => "Tenda\nMakanan\nGuide",
    ]);
    $id = $stmt->fetchColumn();
    echo "Inserted id: $id\n";
    $sel = $pdo->query("SELECT id, title, capacity, activities, facilities, whatsapp_contact FROM events WHERE id = " . (int)$id)->fetchAll(PDO::FETCH_ASSOC);
    print_r($sel);
} catch (Throwable $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
}
