<?php
try {
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman','postgres','postgres');
    $sth = $db->query('select id,name from merchandise order by id');
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo $row['id'] . "\t" . $row['name'] . "\n";
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
