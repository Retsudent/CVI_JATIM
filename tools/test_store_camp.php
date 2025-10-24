<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Models\CampgroundModel;

$model = new CampgroundModel();
$data = [
    'name' => 'TEST CAMP - AUTO',
    'description' => 'Test description',
    'location' => 'Test Village',
    'price_per_person' => '10000.00',
    'capacity_tent' => 10,
    'capacity_people' => 40,
    'capacity_parking' => 8,
    'address' => 'Jl. Test No.1',
    'coordinates_lat' => '-7.9000',
    'coordinates_lng' => '112.6000',
    'facilities' => 'Toilet\nAir bersih',
    'contact_info' => 'WA: 628000',
    'status' => 'active',
    'image' => ''
];

$id = $model->insert($data);
if ($id === false) {
    echo "Insert failed:\n" . print_r($model->errors(), true);
    exit(1);
}

$row = $model->find($id);
if (!$row) {
    echo "Failed to fetch inserted row\n";
    exit(1);
}

echo "Inserted camp id: $id\n";
print_r($row);
