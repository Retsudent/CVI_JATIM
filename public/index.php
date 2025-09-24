<?php

// Simple CVI Wirotaman Website
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
define('ROOTPATH', realpath(FCPATH . '../') . DIRECTORY_SEPARATOR);
define('APPPATH', ROOTPATH . 'app' . DIRECTORY_SEPARATOR);

// Load autoloader
require_once ROOTPATH . 'vendor/autoload.php';

// Load helper functions
require_once APPPATH . 'Helpers/custom_helper.php';
require_once APPPATH . 'Helpers/template_helper.php';

// Simple routing
$request_uri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($request_uri, PHP_URL_PATH);
$path = rtrim($path, '/');
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// Remove base path if exists
$base_path = '/';
if (strpos($path, $base_path) === 0) {
    $path = substr($path, strlen($base_path));
}



// Route handling
switch ($path) {
    case '':
    case '/':
        $title = 'Home - CVI Wirotaman';
        $content = view('home/index');
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'about':
        $title = 'About - CVI Wirotaman';
        $content = view('about/index');
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'event':
        $title = 'Events - CVI Wirotaman';
        $content = view('event/index');
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'event/detail':
    case 'event/detail/':
        $title = 'Detail Event - CVI Wirotaman';
        $content = view('event/detail');
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'event/camping-ramadhan':
        $title = 'Camping Menyambut Ramadhan - CVI Wirotaman';
        $content = view('event/detail', ['event_id' => 'camping-ramadhan']);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'event/anniversary-2nd':
        $title = 'Anniversary CVI Wirotaman 2nd - CVI Wirotaman';
        $content = view('event/detail', ['event_id' => 'anniversary-2nd']);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'event/halal-bi-halal':
        $title = 'Halal Bi Halal CVI WIROTAMAN 2025 - CVI Wirotaman';
        $content = view('event/detail', ['event_id' => 'halal-bi-halal']);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'event/happy-camp':
        $title = 'Happy Camp KOPDAR CVI JATIM - CVI Wirotaman';
        $content = view('event/detail', ['event_id' => 'happy-camp']);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'merchandise':
        $title = 'Merchandise - CVI Wirotaman';
        $content = view('merchandise/index');
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'merchandise/detail':
    case 'merchandise/detail/':
        $title = 'Detail Merchandise - CVI Wirotaman';
        $content = view('merchandise/detail');
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'merchandise/kaos-anniversary':
        $title = 'Kaos Event Anniversary - CVI Wirotaman';
        $content = view('merchandise/detail', ['product_id' => 'kaos-anniversary']);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'merchandise/tumbler-putih':
        $title = 'Tumbler Putih Event Anniversary - CVI Wirotaman';
        $content = view('merchandise/detail', ['product_id' => 'tumbler-putih']);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'merchandise/tumbler-hitam':
        $title = 'Tumbler Hitam Event Anniversary - CVI Wirotaman';
        $content = view('merchandise/detail', ['product_id' => 'tumbler-hitam']);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'merchandise/tumbler-set':
        $title = 'Tumbler Set Vacuum Flask - CVI Wirotaman';
        $content = view('merchandise/detail', ['product_id' => 'tumbler-set']);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'campground':
        $title = 'Campground - CVI Wirotaman';
        
        // Static campground data
        $campgrounds = [
            [
                'id' => 1,
                'name' => 'Telaga Ngebel',
                'description' => 'Campground dengan pemandangan danau yang menakjubkan di Ngebel, Ponorogo. Lokasi ini sangat cocok untuk camping keluarga dengan suasana yang tenang dan udara yang sejuk.',
                'location' => 'Ngebel, Ponorogo, Jawa Timur',
                'price_per_person' => 15000.00,
                'image' => 'telaga-ngebel.jpg',
                'facilities' => 'Area camping seluas 2 hektar, 30+ spot tenda, Toilet dan MCK (5 unit), Air bersih 24 jam, Parkir kendaraan (50 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan spot terbaik, Gazebo untuk meeting, Fire pit area, WiFi gratis',
                'contact_info' => 'WhatsApp: 081234567890',
                'status' => 'active'
            ],
            [
                'id' => 2,
                'name' => 'Bumi Perkemahan Karanganyar',
                'description' => 'Area camping yang luas dengan fasilitas lengkap di Karanganyar, Ngawi. Lokasi strategis dengan akses mudah dan fasilitas modern. Cocok untuk acara besar dan camping kelompok.',
                'location' => 'Karanganyar, Ngawi, Jawa Timur',
                'price_per_person' => 25000.00,
                'image' => 'bumi-perkemahan-karanganyar.jpg',
                'facilities' => 'Area camping seluas 5 hektar, 50+ spot tenda, Toilet dan MCK (10 unit), Air bersih 24 jam, Parkir kendaraan (100 slot), Security 24/7, Kantin dan warung makan, Rental peralatan camping lengkap, Area foto dengan berbagai spot, Hall untuk acara indoor, Fire pit area (3 lokasi), WiFi gratis, Sound system',
                'contact_info' => 'WhatsApp: 081234567891',
                'status' => 'active'
            ],
            [
                'id' => 3,
                'name' => 'Wonder Park Tawangmangu',
                'description' => 'Campground premium dengan pemandangan gunung dan udara sejuk di Tawangmangu. Lokasi eksklusif dengan fasilitas terbaik dan pemandangan yang menakjubkan. Perfect untuk acara spesial dan retreat.',
                'location' => 'Tawangmangu, Magetan, Jawa Timur',
                'price_per_person' => 50000.00,
                'image' => 'wonder-park-tawangmangu.jpg',
                'facilities' => 'Area camping premium seluas 3 hektar, 20+ spot tenda eksklusif, Toilet dan MCK premium (8 unit), Air panas dan dingin 24 jam, Parkir kendaraan (40 slot), Security 24/7, Restaurant dan cafe, Rental peralatan camping premium, Area foto dengan pemandangan gunung, Meeting room ber-AC, Fire pit area dengan pemandangan, WiFi gratis high speed, Sound system profesional, Fotografer profesional',
                'contact_info' => 'WhatsApp: 081234567892',
                'status' => 'active'
            ],
            [
                'id' => 4,
                'name' => 'Bumi Perkemahan Gembira',
                'description' => 'Campground dengan suasana yang menyenangkan di Madiun. Lokasi yang mudah dijangkau dengan fasilitas lengkap dan harga terjangkau. Cocok untuk keluarga dan kelompok kecil.',
                'location' => 'Madiun, Jawa Timur',
                'price_per_person' => 30000.00,
                'image' => 'bumi-perkemahan-gembira.jpg',
                'facilities' => 'Area camping seluas 1.5 hektar, 25+ spot tenda, Toilet dan MCK (6 unit), Air bersih 24 jam, Parkir kendaraan (40 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan berbagai spot, Gazebo untuk meeting, Fire pit area, WiFi gratis, Playground untuk anak',
                'contact_info' => 'WhatsApp: 081234567893',
                'status' => 'active'
            ]
        ];
        
        $content = view('campground/index', ['campgrounds' => $campgrounds]);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'campground/detail/1':
    case 'campground/detail/1/':
        $title = 'Telaga Ngebel - CVI Wirotaman';
        $campground = [
            'id' => 1,
            'name' => 'Telaga Ngebel',
            'description' => 'Telaga Ngebel adalah campground yang menawarkan pemandangan danau yang menakjubkan di Ngebel, Ponorogo. Lokasi ini sangat cocok untuk camping keluarga dengan suasana yang tenang dan udara yang sejuk. Danau yang jernih dan pemandangan perbukitan menciptakan atmosfer yang sempurna untuk relaksasi dan kegiatan outdoor.',
            'location' => 'Ngebel, Ponorogo, Jawa Timur',
            'price_per_person' => 15000.00,
            'image' => 'telaga-ngebel.jpg',
            'facilities' => 'Area camping seluas 2 hektar, 30+ spot tenda, Toilet dan MCK (5 unit), Air bersih 24 jam, Parkir kendaraan (50 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan spot terbaik, Gazebo untuk meeting, Fire pit area, WiFi gratis',
            'contact_info' => 'WhatsApp: 081234567890',
            'status' => 'active'
        ];
        $related_campgrounds = [
            [
                'id' => 2,
                'name' => 'Bumi Perkemahan Karanganyar',
                'description' => 'Area camping yang luas dengan fasilitas lengkap di Karanganyar, Ngawi. Lokasi strategis dengan akses mudah dan fasilitas modern. Cocok untuk acara besar dan camping kelompok.',
                'location' => 'Karanganyar, Ngawi, Jawa Timur',
                'price_per_person' => 25000.00,
                'image' => 'bumi-perkemahan-karanganyar.jpg',
                'facilities' => 'Area camping seluas 5 hektar, 50+ spot tenda, Toilet dan MCK (10 unit), Air bersih 24 jam, Parkir kendaraan (100 slot), Security 24/7, Kantin dan warung makan, Rental peralatan camping lengkap, Area foto dengan berbagai spot, Hall untuk acara indoor, Fire pit area (3 lokasi), WiFi gratis, Sound system',
                'contact_info' => 'WhatsApp: 081234567891',
                'status' => 'active'
            ],
            [
                'id' => 3,
                'name' => 'Wonder Park Tawangmangu',
                'description' => 'Campground premium dengan pemandangan gunung dan udara sejuk di Tawangmangu. Lokasi eksklusif dengan fasilitas terbaik dan pemandangan yang menakjubkan. Perfect untuk acara spesial dan retreat.',
                'location' => 'Tawangmangu, Magetan, Jawa Timur',
                'price_per_person' => 50000.00,
                'image' => 'wonder-park-tawangmangu.jpg',
                'facilities' => 'Area camping premium seluas 3 hektar, 20+ spot tenda eksklusif, Toilet dan MCK premium (8 unit), Air panas dan dingin 24 jam, Parkir kendaraan (40 slot), Security 24/7, Restaurant dan cafe, Rental peralatan camping premium, Area foto dengan pemandangan gunung, Meeting room ber-AC, Fire pit area dengan pemandangan, WiFi gratis high speed, Sound system profesional, Fotografer profesional',
                'contact_info' => 'WhatsApp: 081234567892',
                'status' => 'active'
            ],
            [
                'id' => 4,
                'name' => 'Bumi Perkemahan Gembira',
                'description' => 'Campground dengan suasana yang menyenangkan di Madiun. Lokasi yang mudah dijangkau dengan fasilitas lengkap dan harga terjangkau. Cocok untuk keluarga dan kelompok kecil.',
                'location' => 'Madiun, Jawa Timur',
                'price_per_person' => 30000.00,
                'image' => 'bumi-perkemahan-gembira.jpg',
                'facilities' => 'Area camping seluas 1.5 hektar, 25+ spot tenda, Toilet dan MCK (6 unit), Air bersih 24 jam, Parkir kendaraan (40 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan berbagai spot, Gazebo untuk meeting, Fire pit area, WiFi gratis, Playground untuk anak',
                'contact_info' => 'WhatsApp: 081234567893',
                'status' => 'active'
            ]
        ];
        $content = view('campground/detail', ['campground' => $campground, 'related_campgrounds' => $related_campgrounds]);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'campground/detail/2':
    case 'campground/detail/2/':
        $title = 'Bumi Perkemahan Karanganyar - CVI Wirotaman';
        $campground = [
            'id' => 2,
            'name' => 'Bumi Perkemahan Karanganyar',
            'description' => 'Bumi Perkemahan Karanganyar adalah area camping yang luas dengan fasilitas lengkap di Karanganyar, Ngawi. Lokasi strategis dengan akses mudah dan fasilitas modern. Cocok untuk acara besar dan camping kelompok.',
            'location' => 'Karanganyar, Ngawi, Jawa Timur',
            'price_per_person' => 25000.00,
            'image' => 'bumi-perkemahan-karanganyar.jpg',
            'facilities' => 'Area camping seluas 5 hektar, 50+ spot tenda, Toilet dan MCK (10 unit), Air bersih 24 jam, Parkir kendaraan (100 slot), Security 24/7, Kantin dan warung makan, Rental peralatan camping lengkap, Area foto dengan berbagai spot, Hall untuk acara indoor, Fire pit area (3 lokasi), WiFi gratis, Sound system',
            'contact_info' => 'WhatsApp: 081234567891',
            'status' => 'active'
        ];
        $related_campgrounds = [
            [
                'id' => 1,
                'name' => 'Telaga Ngebel',
                'description' => 'Campground dengan pemandangan danau yang menakjubkan di Ngebel, Ponorogo. Lokasi ini sangat cocok untuk camping keluarga dengan suasana yang tenang dan udara yang sejuk.',
                'location' => 'Ngebel, Ponorogo, Jawa Timur',
                'price_per_person' => 15000.00,
                'image' => 'telaga-ngebel.jpg',
                'facilities' => 'Area camping seluas 2 hektar, 30+ spot tenda, Toilet dan MCK (5 unit), Air bersih 24 jam, Parkir kendaraan (50 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan spot terbaik, Gazebo untuk meeting, Fire pit area, WiFi gratis',
                'contact_info' => 'WhatsApp: 081234567890',
                'status' => 'active'
            ],
            [
                'id' => 3,
                'name' => 'Wonder Park Tawangmangu',
                'description' => 'Campground premium dengan pemandangan gunung dan udara sejuk di Tawangmangu. Lokasi eksklusif dengan fasilitas terbaik dan pemandangan yang menakjubkan. Perfect untuk acara spesial dan retreat.',
                'location' => 'Tawangmangu, Magetan, Jawa Timur',
                'price_per_person' => 50000.00,
                'image' => 'wonder-park-tawangmangu.jpg',
                'facilities' => 'Area camping premium seluas 3 hektar, 20+ spot tenda eksklusif, Toilet dan MCK premium (8 unit), Air panas dan dingin 24 jam, Parkir kendaraan (40 slot), Security 24/7, Restaurant dan cafe, Rental peralatan camping premium, Area foto dengan pemandangan gunung, Meeting room ber-AC, Fire pit area dengan pemandangan, WiFi gratis high speed, Sound system profesional, Fotografer profesional',
                'contact_info' => 'WhatsApp: 081234567892',
                'status' => 'active'
            ],
            [
                'id' => 4,
                'name' => 'Bumi Perkemahan Gembira',
                'description' => 'Campground dengan suasana yang menyenangkan di Madiun. Lokasi yang mudah dijangkau dengan fasilitas lengkap dan harga terjangkau. Cocok untuk keluarga dan kelompok kecil.',
                'location' => 'Madiun, Jawa Timur',
                'price_per_person' => 30000.00,
                'image' => 'bumi-perkemahan-gembira.jpg',
                'facilities' => 'Area camping seluas 1.5 hektar, 25+ spot tenda, Toilet dan MCK (6 unit), Air bersih 24 jam, Parkir kendaraan (40 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan berbagai spot, Gazebo untuk meeting, Fire pit area, WiFi gratis, Playground untuk anak',
                'contact_info' => 'WhatsApp: 081234567893',
                'status' => 'active'
            ]
        ];
        $content = view('campground/detail', ['campground' => $campground, 'related_campgrounds' => $related_campgrounds]);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'campground/detail/3':
    case 'campground/detail/3/':
        $title = 'Wonder Park Tawangmangu - CVI Wirotaman';
        $campground = [
            'id' => 3,
            'name' => 'Wonder Park Tawangmangu',
            'description' => 'Wonder Park Tawangmangu adalah campground premium dengan pemandangan gunung dan udara sejuk di Tawangmangu. Lokasi eksklusif dengan fasilitas terbaik dan pemandangan yang menakjubkan. Perfect untuk acara spesial dan retreat.',
            'location' => 'Tawangmangu, Magetan, Jawa Timur',
            'price_per_person' => 50000.00,
            'image' => 'wonder-park-tawangmangu.jpg',
            'facilities' => 'Area camping premium seluas 3 hektar, 20+ spot tenda eksklusif, Toilet dan MCK premium (8 unit), Air panas dan dingin 24 jam, Parkir kendaraan (40 slot), Security 24/7, Restaurant dan cafe, Rental peralatan camping premium, Area foto dengan pemandangan gunung, Meeting room ber-AC, Fire pit area dengan pemandangan, WiFi gratis high speed, Sound system profesional, Fotografer profesional',
            'contact_info' => 'WhatsApp: 081234567892',
            'status' => 'active'
        ];
        $related_campgrounds = [
            [
                'id' => 1,
                'name' => 'Telaga Ngebel',
                'description' => 'Campground dengan pemandangan danau yang menakjubkan di Ngebel, Ponorogo. Lokasi ini sangat cocok untuk camping keluarga dengan suasana yang tenang dan udara yang sejuk.',
                'location' => 'Ngebel, Ponorogo, Jawa Timur',
                'price_per_person' => 15000.00,
                'image' => 'telaga-ngebel.jpg',
                'facilities' => 'Area camping seluas 2 hektar, 30+ spot tenda, Toilet dan MCK (5 unit), Air bersih 24 jam, Parkir kendaraan (50 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan spot terbaik, Gazebo untuk meeting, Fire pit area, WiFi gratis',
                'contact_info' => 'WhatsApp: 081234567890',
                'status' => 'active'
            ],
            [
                'id' => 2,
                'name' => 'Bumi Perkemahan Karanganyar',
                'description' => 'Area camping yang luas dengan fasilitas lengkap di Karanganyar, Ngawi. Lokasi strategis dengan akses mudah dan fasilitas modern. Cocok untuk acara besar dan camping kelompok.',
                'location' => 'Karanganyar, Ngawi, Jawa Timur',
                'price_per_person' => 25000.00,
                'image' => 'bumi-perkemahan-karanganyar.jpg',
                'facilities' => 'Area camping seluas 5 hektar, 50+ spot tenda, Toilet dan MCK (10 unit), Air bersih 24 jam, Parkir kendaraan (100 slot), Security 24/7, Kantin dan warung makan, Rental peralatan camping lengkap, Area foto dengan berbagai spot, Hall untuk acara indoor, Fire pit area (3 lokasi), WiFi gratis, Sound system',
                'contact_info' => 'WhatsApp: 081234567891',
                'status' => 'active'
            ],
            [
                'id' => 4,
                'name' => 'Bumi Perkemahan Gembira',
                'description' => 'Campground dengan suasana yang menyenangkan di Madiun. Lokasi yang mudah dijangkau dengan fasilitas lengkap dan harga terjangkau. Cocok untuk keluarga dan kelompok kecil.',
                'location' => 'Madiun, Jawa Timur',
                'price_per_person' => 30000.00,
                'image' => 'bumi-perkemahan-gembira.jpg',
                'facilities' => 'Area camping seluas 1.5 hektar, 25+ spot tenda, Toilet dan MCK (6 unit), Air bersih 24 jam, Parkir kendaraan (40 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan berbagai spot, Gazebo untuk meeting, Fire pit area, WiFi gratis, Playground untuk anak',
                'contact_info' => 'WhatsApp: 081234567893',
                'status' => 'active'
            ]
        ];
        $content = view('campground/detail', ['campground' => $campground, 'related_campgrounds' => $related_campgrounds]);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'campground/detail/4':
    case 'campground/detail/4/':
        $title = 'Bumi Perkemahan Gembira - CVI Wirotaman';
        $campground = [
            'id' => 4,
            'name' => 'Bumi Perkemahan Gembira',
            'description' => 'Bumi Perkemahan Gembira adalah campground dengan suasana yang menyenangkan di Madiun. Lokasi yang mudah dijangkau dengan fasilitas lengkap dan harga terjangkau. Cocok untuk keluarga dan kelompok kecil.',
            'location' => 'Madiun, Jawa Timur',
            'price_per_person' => 30000.00,
            'image' => 'bumi-perkemahan-gembira.jpg',
            'facilities' => 'Area camping seluas 1.5 hektar, 25+ spot tenda, Toilet dan MCK (6 unit), Air bersih 24 jam, Parkir kendaraan (40 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan berbagai spot, Gazebo untuk meeting, Fire pit area, WiFi gratis, Playground untuk anak',
            'contact_info' => 'WhatsApp: 081234567893',
            'status' => 'active'
        ];
        $related_campgrounds = [
            [
                'id' => 1,
                'name' => 'Telaga Ngebel',
                'description' => 'Campground dengan pemandangan danau yang menakjubkan di Ngebel, Ponorogo. Lokasi ini sangat cocok untuk camping keluarga dengan suasana yang tenang dan udara yang sejuk.',
                'location' => 'Ngebel, Ponorogo, Jawa Timur',
                'price_per_person' => 15000.00,
                'image' => 'telaga-ngebel.jpg',
                'facilities' => 'Area camping seluas 2 hektar, 30+ spot tenda, Toilet dan MCK (5 unit), Air bersih 24 jam, Parkir kendaraan (50 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan spot terbaik, Gazebo untuk meeting, Fire pit area, WiFi gratis',
                'contact_info' => 'WhatsApp: 081234567890',
                'status' => 'active'
            ],
            [
                'id' => 2,
                'name' => 'Bumi Perkemahan Karanganyar',
                'description' => 'Area camping yang luas dengan fasilitas lengkap di Karanganyar, Ngawi. Lokasi strategis dengan akses mudah dan fasilitas modern. Cocok untuk acara besar dan camping kelompok.',
                'location' => 'Karanganyar, Ngawi, Jawa Timur',
                'price_per_person' => 25000.00,
                'image' => 'bumi-perkemahan-karanganyar.jpg',
                'facilities' => 'Area camping seluas 5 hektar, 50+ spot tenda, Toilet dan MCK (10 unit), Air bersih 24 jam, Parkir kendaraan (100 slot), Security 24/7, Kantin dan warung makan, Rental peralatan camping lengkap, Area foto dengan berbagai spot, Hall untuk acara indoor, Fire pit area (3 lokasi), WiFi gratis, Sound system',
                'contact_info' => 'WhatsApp: 081234567891',
                'status' => 'active'
            ],
            [
                'id' => 3,
                'name' => 'Wonder Park Tawangmangu',
                'description' => 'Campground premium dengan pemandangan gunung dan udara sejuk di Tawangmangu. Lokasi eksklusif dengan fasilitas terbaik dan pemandangan yang menakjubkan. Perfect untuk acara spesial dan retreat.',
                'location' => 'Tawangmangu, Magetan, Jawa Timur',
                'price_per_person' => 50000.00,
                'image' => 'wonder-park-tawangmangu.jpg',
                'facilities' => 'Area camping premium seluas 3 hektar, 20+ spot tenda eksklusif, Toilet dan MCK premium (8 unit), Air panas dan dingin 24 jam, Parkir kendaraan (40 slot), Security 24/7, Restaurant dan cafe, Rental peralatan camping premium, Area foto dengan pemandangan gunung, Meeting room ber-AC, Fire pit area dengan pemandangan, WiFi gratis high speed, Sound system profesional, Fotografer profesional',
                'contact_info' => 'WhatsApp: 081234567892',
                'status' => 'active'
            ]
        ];
        $content = view('campground/detail', ['campground' => $campground, 'related_campgrounds' => $related_campgrounds]);
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'gallery':
        $title = 'Gallery - CVI Wirotaman';
        $content = view('gallery/index');
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'contact':
        $title = 'Contact - CVI Wirotaman';
        $content = view('contact/index');
        include APPPATH . 'Views/layouts/main.php';
        break;
        
    case 'login':
        // Start session for login
        session_start();
        
        // Handle login GET request
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $title = 'Login - CVI Wirotaman';
            include APPPATH . 'Views/login/index.php';
        } else {
            // Handle login POST request
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';
            
            // Simple demo auth
            $validUser = getenv('APP_ADMIN_USER') ?: 'admin';
            $validPass = getenv('APP_ADMIN_PASS') ?: 'admin123';
            
            if ($username === $validUser && $password === $validPass) {
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['username'] = $username;
                header('Location: http://localhost:8080/admin');
                exit;
            } else {
                $_SESSION['error'] = 'Login gagal. Periksa kembali kredensial Anda.';
                header('Location: http://localhost:8080/login');
                exit;
            }
        }
        break;
        
    case 'logout':
        session_start();
        session_destroy();
        header('Location: http://localhost:8080/login');
        exit;
        break;
        
    case 'admin':
        session_start();
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: http://localhost:8080/login');
            exit;
        }
        $title = 'Admin Dashboard - CVI Wirotaman';
        include APPPATH . 'Views/admin/dashboard.php';
        break;
        
    case 'admin/events':
        session_start();
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: http://localhost:8080/login');
            exit;
        }
        if ($method === 'POST') {
            // Minimal POST handler to create event
            try {
                $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                $stmt = $pdo->prepare('INSERT INTO events (title, description, location, start_date, end_date, image, price, status, created_at, updated_at) VALUES (:title,:description,:location,:start_date,:end_date,:image,:price,:status,NOW(),NOW())');
                $stmt->execute([
                    ':title' => $_POST['title'] ?? '',
                    ':description' => $_POST['description'] ?? '',
                    ':location' => $_POST['location'] ?? '',
                    ':start_date' => $_POST['start_date'] ?? null,
                    ':end_date' => $_POST['end_date'] ?? null,
                    ':image' => $_POST['image'] ?? null,
                    ':price' => $_POST['price'] !== '' ? $_POST['price'] : null,
                    ':status' => $_POST['status'] ?? 'upcoming',
                ]);
            } catch (Throwable $e) {
                // swallow for now
            }
            header('Location: http://localhost:8080/admin/events');
            exit;
        }
        $title = 'Events Management - CVI Wirotaman';
        include APPPATH . 'Views/admin/events/index.php';
        break;
        
    case 'admin/merchandise':
        session_start();
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: http://localhost:8080/login');
            exit;
        }
        if ($method === 'POST') {
            try {
                $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                $stmt = $pdo->prepare('INSERT INTO merchandise (name, description, price, image, category, stock, status, created_at, updated_at) VALUES (:name,:description,:price,:image,:category,:stock,:status,NOW(),NOW())');
                $stmt->execute([
                    ':name' => $_POST['name'] ?? '',
                    ':description' => $_POST['description'] ?? '',
                    ':price' => $_POST['price'] ?? 0,
                    ':image' => $_POST['image'] ?? null,
                    ':category' => $_POST['category'] ?? '',
                    ':stock' => (int)($_POST['stock'] ?? 0),
                    ':status' => $_POST['status'] ?? 'available',
                ]);
            } catch (Throwable $e) {
                // swallow for now
            }
            header('Location: http://localhost:8080/admin/merchandise');
            exit;
        }
        $title = 'Merchandise Management - CVI Wirotaman';
        include APPPATH . 'Views/admin/merchandise/index.php';
        break;
        
    case 'admin/campground':
        session_start();
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: http://localhost:8080/login');
            exit;
        }
        if ($method === 'POST') {
            try {
                $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                $stmt = $pdo->prepare('INSERT INTO campgrounds (name, description, location, price_per_person, image, facilities, contact_info, status, created_at, updated_at) VALUES (:name,:description,:location,:price_per_person,:image,:facilities,:contact_info,:status,NOW(),NOW())');
                $stmt->execute([
                    ':name' => $_POST['name'] ?? '',
                    ':description' => $_POST['description'] ?? '',
                    ':location' => $_POST['location'] ?? '',
                    ':price_per_person' => $_POST['price_per_person'] ?? 0,
                    ':image' => $_POST['image'] ?? null,
                    ':facilities' => $_POST['facilities'] ?? null,
                    ':contact_info' => $_POST['contact_info'] ?? null,
                    ':status' => $_POST['status'] ?? 'active',
                ]);
            } catch (Throwable $e) {
                // swallow for now
            }
            header('Location: http://localhost:8080/admin/campground');
            exit;
        }
        $title = 'Campground Management - CVI Wirotaman';
        include APPPATH . 'Views/admin/campground/index.php';
        break;
        
    case 'admin/gallery':
        session_start();
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: http://localhost:8080/login');
            exit;
        }
        if ($method === 'POST') {
            // handle photo upload
            $stored = null;
            if (!empty($_FILES['image_file']['tmp_name'])) {
                $ext = pathinfo($_FILES['image_file']['name'] ?? '', PATHINFO_EXTENSION);
                $name = bin2hex(random_bytes(8)) . ($ext ? ('.' . $ext) : '');
                $dest = ROOTPATH . 'public' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $name;
                @move_uploaded_file($_FILES['image_file']['tmp_name'], $dest);
                $stored = $name;
            }
            try {
                $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                $stmt = $pdo->prepare('INSERT INTO photos (title, caption, image, created_at, updated_at) VALUES (:title,:caption,:image,NOW(),NOW())');
                $stmt->execute([
                    ':title' => $_POST['title'] ?? '',
                    ':caption' => $_POST['caption'] ?? '',
                    ':image' => $stored,
                ]);
            } catch (Throwable $e) {
                // ignore
            }
            header('Location: http://localhost:8080/admin/gallery');
            exit;
        }
        $title = 'Gallery Management - CVI Wirotaman';
        include APPPATH . 'Views/admin/gallery/index.php';
        break;

    case 'admin/gallery/create':
        session_start();
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: http://localhost:8080/login');
            exit;
        }
        $title = 'Tambah Foto - CVI Wirotaman';
        include APPPATH . 'Views/admin/gallery/create.php';
        break;

    case 'admin/events/create':
        session_start();
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: http://localhost:8080/login');
            exit;
        }
        $title = 'Tambah Event - CVI Wirotaman';
        include APPPATH . 'Views/admin/events/create.php';
        break;

    case 'admin/merchandise/create':
        session_start();
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: http://localhost:8080/login');
            exit;
        }
        $title = 'Tambah Merchandise - CVI Wirotaman';
        include APPPATH . 'Views/admin/merchandise/create.php';
        break;

    case 'admin/campground/create':
        session_start();
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: http://localhost:8080/login');
            exit;
        }
        $title = 'Tambah Campground - CVI Wirotaman';
        include APPPATH . 'Views/admin/campground/create.php';
        break;
        
    default:
        http_response_code(404);
        $title = '404 - Page Not Found';
        echo '<!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>404 - Page Not Found</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body { background: linear-gradient(135deg, #f0f8ff 0%, #e6ffe6 50%, #f0fff0 100%); }
                .error-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; }
            </style>
        </head>
        <body>
            <div class="error-container">
                <div class="text-center">
                    <h1 class="display-1 text-success">404</h1>
                    <h2 class="mb-4">Halaman Tidak Ditemukan</h2>
                    <p class="lead mb-4">Maaf, halaman yang Anda cari tidak ditemukan.</p>
                    <a href="/" class="btn btn-success btn-lg">Kembali ke Home</a>
                </div>
            </div>
        </body>
        </html>';
        break;
}
?>