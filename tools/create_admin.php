<?php
// Usage: php create_admin.php username password [--force]
$options = getopt('', ['force']);
$force = isset($options['force']);

if ($argc < 3) {
    echo "Usage: php create_admin.php <username> <password> [--force]\n";
    exit(2);
}

$username = $argv[1];
$password = $argv[2];

// DB config - mirror app/Config/Database.php default group
$host = '127.0.0.1';
$port = 5432;
$db   = 'cvi_wirotaman';
$user = 'postgres';
$pass = 'postgres';
$dsn = "pgsql:host=$host;port=$port;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "ERROR: Could not connect to DB: " . $e->getMessage() . "\n";
    exit(1);
}

// Check if users table exists and insert/update
try {
    $stmt = $pdo->prepare('SELECT id, username FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $now = (new DateTime())->format('Y-m-d H:i:s');

    if ($row) {
        if (!$force) {
            echo "User '$username' already exists (id={$row['id']}). Use --force to overwrite password.\n";
            exit(3);
        }
        // Update password_hash and updated_at
        $upd = $pdo->prepare('UPDATE users SET password_hash = :hash, updated_at = :now WHERE id = :id');
        $upd->execute(['hash' => $hash, 'now' => $now, 'id' => $row['id']]);
        echo "Updated password for user '$username' (id={$row['id']}).\n";
        exit(0);
    }

    // Insert
    $ins = $pdo->prepare('INSERT INTO users (username, password_hash, role, created_at, updated_at) VALUES (:username, :hash, :role, :now, :now) RETURNING id');
    $ins->execute(['username' => $username, 'hash' => $hash, 'role' => 'admin', 'now' => $now]);
    $newId = $ins->fetchColumn();
    echo "Created admin user '$username' with id $newId.\n";
    exit(0);

} catch (PDOException $e) {
    echo "ERROR (DB): " . $e->getMessage() . "\n";
    exit(4);
}
