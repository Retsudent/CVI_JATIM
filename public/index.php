<?php

// Simple CVI Wirotaman Website
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
define('ROOTPATH', realpath(FCPATH . '../') . DIRECTORY_SEPARATOR);
define('APPPATH', ROOTPATH . 'app' . DIRECTORY_SEPARATOR);

// Load autoloader
require_once ROOTPATH . 'vendor/autoload.php';

// Load helper functions
require_once APPPATH . 'Helpers/custom_helper.php';

// Sample data untuk demo
$events = [
    [
        'id' => 1,
        'title' => 'Anniversary CVI Wirotaman 2nd',
        'description' => 'Perayaan ulang tahun ke-2 CVI Wirotaman dengan berbagai kegiatan seru dan menarik.',
        'location' => 'Wonder Park - Tawangmangu',
        'start_date' => '2025-05-10',
        'end_date' => '2025-05-11',
        'image' => 'anniversary-2nd.jpg',
        'price' => 0.00,
        'status' => 'upcoming'
    ],
    [
        'id' => 2,
        'title' => 'Happy Camp KOPDAR CVI JATIM',
        'description' => 'Kopdar dan camping bersama komunitas CVI Jawa Timur.',
        'location' => 'Bumi Perkemahan Karanganyar',
        'start_date' => '2024-03-02',
        'end_date' => '2024-03-03',
        'image' => 'happy-camp.jpg',
        'price' => 0.00,
        'status' => 'completed'
    ]
];

$merchandise = [
    [
        'id' => 1,
        'name' => 'Kaos Event Anniversary CVI WIROTAMAN 2nd',
        'description' => 'Kaos eksklusif untuk event Anniversary CVI Wirotaman ke-2 dengan desain menarik.',
        'price' => 100000.00,
        'image' => 'kaos-anniversary.jpg',
        'category' => 'Apparel',
        'stock' => 50,
        'status' => 'available'
    ],
    [
        'id' => 2,
        'name' => 'Tumbler Hitam Event Anniversary CVI WIROTAMAN 2nd',
        'description' => 'Tumbler hitam dengan logo CVI Wirotaman untuk event Anniversary.',
        'price' => 45000.00,
        'image' => 'tumbler-hitam.jpg',
        'category' => 'Accessories',
        'stock' => 30,
        'status' => 'available'
    ]
];

$campgrounds = [
    [
        'id' => 1,
        'name' => 'Telaga Ngebel',
        'description' => 'Campground dengan pemandangan danau yang indah, cocok untuk camping dan kegiatan outdoor.',
        'location' => 'Ngebel, Ponorogo',
        'price_per_person' => 15000.00,
        'image' => 'telaga-ngebel.jpg',
        'facilities' => 'Toilet, Air bersih, Area parkir, Tempat sampah',
        'contact_info' => 'WhatsApp: 081234567890',
        'status' => 'active'
    ],
    [
        'id' => 2,
        'name' => 'Gunung Lawu',
        'description' => 'Campground di kaki Gunung Lawu dengan udara sejuk dan pemandangan gunung yang menakjubkan.',
        'location' => 'Magetan',
        'price_per_person' => 20000.00,
        'image' => 'gunung-lawu.jpg',
        'facilities' => 'Toilet, Air bersih, Area parkir, Tempat sampah, Warung',
        'contact_info' => 'WhatsApp: 081234567891',
        'status' => 'active'
    ]
];

// Simple routing
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);
$path = rtrim($path, '/');

// Determine which page to load
$page = 'home';
$content = '';

if ($path === '' || $path === '/') {
    $page = 'home';
    ob_start();
    include 'homepage.php';
    $content = ob_get_clean();
} elseif ($path === '/event') {
    $page = 'event';
    ob_start();
    include APPPATH . 'Views/event/index.php';
    $content = ob_get_clean();
} elseif (preg_match('/^\/event\/detail\/(\d+)$/', $path, $matches)) {
    $page = 'event-detail';
    $event_id = $matches[1];
    // Find event by ID
    $event = null;
    foreach ($events as $e) {
        if ($e['id'] == $event_id) {
            $event = $e;
            break;
        }
    }
    if ($event) {
        ob_start();
        include APPPATH . 'Views/event/detail.php';
        $content = ob_get_clean();
    } else {
        $page = '404';
        $content = '<div class="container py-5"><div class="text-center"><h1>404</h1><p>Event tidak ditemukan</p></div></div>';
    }
} elseif ($path === '/merchandise') {
    $page = 'merchandise';
    ob_start();
    include APPPATH . 'Views/merchandise/index.php';
    $content = ob_get_clean();
} elseif (preg_match('/^\/merchandise\/detail\/(\d+)$/', $path, $matches)) {
    $page = 'merchandise-detail';
    $merchandise_id = $matches[1];
    // Find merchandise by ID
    $merchandise_item = null;
    foreach ($merchandise as $m) {
        if ($m['id'] == $merchandise_id) {
            $merchandise_item = $m;
            break;
        }
    }
    if ($merchandise_item) {
        // Set merchandise data for the view
        $merchandise = $merchandise_item;
        ob_start();
        include APPPATH . 'Views/merchandise/detail.php';
        $content = ob_get_clean();
    } else {
        $page = '404';
        $content = '<div class="container py-5"><div class="text-center"><h1>404</h1><p>Merchandise tidak ditemukan</p></div></div>';
    }
} elseif ($path === '/campground') {
    $page = 'campground';
    ob_start();
    include APPPATH . 'Views/campground/index.php';
    $content = ob_get_clean();
} elseif (preg_match('/^\/campground\/detail\/(\d+)$/', $path, $matches)) {
    $page = 'campground-detail';
    $campground_id = $matches[1];
    // Find campground by ID
    $campground_item = null;
    foreach ($campgrounds as $c) {
        if ($c['id'] == $campground_id) {
            $campground_item = $c;
            break;
        }
    }
    if ($campground_item) {
        // Set campground data for the view
        $campground = $campground_item;
        ob_start();
        include APPPATH . 'Views/campground/detail.php';
        $content = ob_get_clean();
    } else {
        $page = '404';
        $content = '<div class="container py-5"><div class="text-center"><h1>404</h1><p>Campground tidak ditemukan</p></div></div>';
    }
} elseif ($path === '/about') {
    $page = 'about';
    ob_start();
    include APPPATH . 'Views/about/index.php';
    $content = ob_get_clean();
} elseif ($path === '/contact') {
    $page = 'contact';
    ob_start();
    include APPPATH . 'Views/contact/index.php';
    $content = ob_get_clean();
} elseif ($path === '/gallery') {
    $page = 'gallery';
    ob_start();
    include APPPATH . 'Views/gallery/index.php';
    $content = ob_get_clean();
} else {
    // Default to home
    $page = 'home';
    ob_start();
    include 'homepage.php';
    $content = ob_get_clean();
}

// Load the main layout
include APPPATH . 'Views/layouts/main.php';
?>