<?php
// Campground data based on ID
$campground_id = $campground_id ?? 'telaga-ngebel';

$campgrounds = [
    'telaga-ngebel' => [
        'title' => 'Telaga Ngebel',
        'location' => 'Ngebel, Ponorogo, Jawa Timur',
        'price' => 'Rp 15.000/orang',
        'status' => 'available',
        'rating' => 4.8,
        'reviews' => 25,
        'image' => 'https://cviwirotaman.web.id/assets/img/campground/telaga-ngebel.jpg',
        'description' => 'Telaga Ngebel adalah campground yang menawarkan pemandangan danau yang menakjubkan di Ngebel, Ponorogo. Lokasi ini sangat cocok untuk camping keluarga dengan suasana yang tenang dan udara yang sejuk. Danau yang jernih dan pemandangan perbukitan menciptakan atmosfer yang sempurna untuk relaksasi dan kegiatan outdoor.',
        'facilities' => [
            'Area camping seluas 2 hektar',
            '30+ spot tenda',
            'Toilet dan MCK (5 unit)',
            'Air bersih 24 jam',
            'Parkir kendaraan (50 slot)',
            'Security 24/7',
            'Warung makan dan minuman',
            'Rental peralatan camping',
            'Area foto dengan spot terbaik',
            'Gazebo untuk meeting',
            'Fire pit area',
            'WiFi gratis'
        ],
        'capacity' => [
            'tent' => '30+',
            'people' => '100+',
            'parking' => '50'
        ],
        'activities' => [
            'Camping dan tenda',
            'Fotografi landscape',
            'Jalan-jalan mengelilingi danau',
            'Bird watching',
            'Stargazing di malam hari'
        ],
        'best_time' => [
            'Musim kemarau (April - Oktober)',
            'Pagi hari untuk sunrise',
            'Sore hari untuk sunset',
            'Malam hari untuk stargazing'
        ],
        'address' => 'Telaga Ngebel, Desa Ngebel, Kecamatan Ngebel, Kabupaten Ponorogo, Jawa Timur 63493',
        'coordinates' => ['-7.8234°', '111.4567°'],
        'access' => [
            'Kendaraan Pribadi' => '2 jam dari Surabaya',
            'Bus' => 'Terminal Ponorogo + Ojek',
            'Kereta' => 'Stasiun Ponorogo + Ojek'
        ],
        'distances' => [
            'Ponorogo' => '25 km',
            'Madiun' => '45 km',
            'Surabaya' => '120 km'
        ]
    ],
    'karanganyar' => [
        'title' => 'Bumi Perkemahan Karanganyar',
        'location' => 'Karanganyar, Ngawi, Jawa Timur',
        'price' => 'Rp 25.000/orang',
        'status' => 'available',
        'rating' => 4.2,
        'reviews' => 18,
        'image' => 'https://cviwirotaman.web.id/assets/img/campground/bumi-perkemahan-karanganyar.jpg',
        'description' => 'Bumi Perkemahan Karanganyar adalah area camping yang luas dengan fasilitas lengkap di Karanganyar, Ngawi. Lokasi strategis dengan akses mudah dan fasilitas modern. Cocok untuk acara besar dan camping kelompok.',
        'facilities' => [
            'Area camping seluas 5 hektar',
            '50+ spot tenda',
            'Toilet dan MCK (10 unit)',
            'Air bersih 24 jam',
            'Parkir kendaraan (100 slot)',
            'Security 24/7',
            'Kantin dan warung makan',
            'Rental peralatan camping lengkap',
            'Area foto dengan berbagai spot',
            'Hall untuk acara indoor',
            'Fire pit area (3 lokasi)',
            'WiFi gratis',
            'Sound system'
        ],
        'capacity' => [
            'tent' => '50+',
            'people' => '200+',
            'parking' => '100'
        ],
        'activities' => [
            'Camping kelompok besar',
            'Outbound dan team building',
            'Fotografi landscape',
            'Jalan-jalan di area perkebunan',
            'Stargazing di malam hari',
            'Bersepeda keliling area'
        ],
        'best_time' => [
            'Musim kemarau (April - Oktober)',
            'Pagi hari untuk aktivitas outdoor',
            'Sore hari untuk sunset',
            'Malam hari untuk api unggun'
        ],
        'address' => 'Bumi Perkemahan Karanganyar, Desa Karanganyar, Kecamatan Karanganyar, Kabupaten Ngawi, Jawa Timur 63292',
        'coordinates' => ['-7.4567°', '111.2345°'],
        'access' => [
            'Kendaraan Pribadi' => '1.5 jam dari Surabaya',
            'Bus' => 'Terminal Ngawi + Ojek',
            'Kereta' => 'Stasiun Ngawi + Ojek'
        ],
        'distances' => [
            'Ngawi' => '15 km',
            'Madiun' => '30 km',
            'Surabaya' => '90 km'
        ]
    ],
    'wonder-park' => [
        'title' => 'Wonder Park Tawangmangu',
        'location' => 'Tawangmangu, Magetan, Jawa Timur',
        'price' => 'Rp 50.000/orang',
        'status' => 'almost_full',
        'rating' => 4.9,
        'reviews' => 32,
        'image' => 'https://cviwirotaman.web.id/assets/img/campground/wonder-park-tawangmangu.jpg',
        'description' => 'Wonder Park Tawangmangu adalah campground premium dengan pemandangan gunung dan udara sejuk di Tawangmangu. Lokasi eksklusif dengan fasilitas terbaik dan pemandangan yang menakjubkan. Perfect untuk acara spesial dan retreat.',
        'facilities' => [
            'Area camping premium seluas 3 hektar',
            '20+ spot tenda eksklusif',
            'Toilet dan MCK premium (8 unit)',
            'Air panas dan dingin 24 jam',
            'Parkir kendaraan (40 slot)',
            'Security 24/7',
            'Restaurant dan cafe',
            'Rental peralatan camping premium',
            'Area foto dengan pemandangan gunung',
            'Meeting room ber-AC',
            'Fire pit area dengan pemandangan',
            'WiFi gratis high speed',
            'Sound system profesional',
            'Fotografer profesional'
        ],
        'capacity' => [
            'tent' => '20+',
            'people' => '80+',
            'parking' => '40'
        ],
        'activities' => [
            'Camping premium dengan pemandangan gunung',
            'Fotografi landscape profesional',
            'Trekking ke puncak gunung',
            'Bird watching dan wildlife',
            'Stargazing dengan teleskop',
            'Yoga dan meditasi di alam',
            'Mountain biking'
        ],
        'best_time' => [
            'Musim kemarau (April - Oktober)',
            'Pagi hari untuk sunrise di gunung',
            'Sore hari untuk sunset',
            'Malam hari untuk stargazing'
        ],
        'address' => 'Wonder Park Tawangmangu, Desa Tawangmangu, Kecamatan Tawangmangu, Kabupaten Magetan, Jawa Timur 63395',
        'coordinates' => ['-7.6789°', '111.1234°'],
        'access' => [
            'Kendaraan Pribadi' => '2.5 jam dari Surabaya',
            'Bus' => 'Terminal Magetan + Ojek',
            'Kereta' => 'Stasiun Magetan + Ojek'
        ],
        'distances' => [
            'Magetan' => '20 km',
            'Solo' => '40 km',
            'Surabaya' => '150 km'
        ]
    ],
    'gembira' => [
        'title' => 'Bumi Perkemahan Gembira',
        'location' => 'Madiun, Jawa Timur',
        'price' => 'Rp 30.000/orang',
        'status' => 'available',
        'rating' => 4.0,
        'reviews' => 15,
        'image' => 'https://cviwirotaman.web.id/assets/img/campground/bumi-perkemahan-gembira.jpg',
        'description' => 'Bumi Perkemahan Gembira adalah campground dengan suasana yang menyenangkan di Madiun. Lokasi yang mudah dijangkau dengan fasilitas lengkap dan harga terjangkau. Cocok untuk keluarga dan kelompok kecil.',
        'facilities' => [
            'Area camping seluas 1.5 hektar',
            '25+ spot tenda',
            'Toilet dan MCK (6 unit)',
            'Air bersih 24 jam',
            'Parkir kendaraan (40 slot)',
            'Security 24/7',
            'Warung makan dan minuman',
            'Rental peralatan camping',
            'Area foto dengan berbagai spot',
            'Gazebo untuk meeting',
            'Fire pit area',
            'WiFi gratis',
            'Playground untuk anak'
        ],
        'capacity' => [
            'tent' => '25+',
            'people' => '80+',
            'parking' => '40'
        ],
        'activities' => [
            'Camping keluarga',
            'Fotografi dengan berbagai spot',
            'Jalan-jalan di area perkebunan',
            'Bermain di playground',
            'Stargazing di malam hari',
            'Bersepeda keliling area'
        ],
        'best_time' => [
            'Musim kemarau (April - Oktober)',
            'Pagi hari untuk aktivitas outdoor',
            'Sore hari untuk sunset',
            'Malam hari untuk api unggun'
        ],
        'address' => 'Bumi Perkemahan Gembira, Desa Gembira, Kecamatan Madiun, Kabupaten Madiun, Jawa Timur 63111',
        'coordinates' => ['-7.5678°', '111.3456°'],
        'access' => [
            'Kendaraan Pribadi' => '1 jam dari Surabaya',
            'Bus' => 'Terminal Madiun + Ojek',
            'Kereta' => 'Stasiun Madiun + Ojek'
        ],
        'distances' => [
            'Madiun' => '10 km',
            'Ngawi' => '25 km',
            'Surabaya' => '80 km'
        ]
    ]
];

$campground = $campgrounds[$campground_id] ?? $campgrounds['telaga-ngebel'];
?>

<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content text-center">
            <!-- Page Icon Above Title -->
            <div class="mb-3">
                <i class="fas fa-campground fa-4x" style="color: var(--accent-green);"></i>
            </div>
            
            <!-- Page Title Below Icon -->
            <h1 class="hero-title">
                Detail Campground
            </h1>
            <p class="hero-subtitle">
                Informasi lengkap tentang campground CVI Wirotaman
            </p>
        </div>
    </div>
</section>

<!-- Campground Detail Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Campground Images -->
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body p-0">
                    <div class="position-relative">
                            <div class="campground-placeholder" style="height: 400px; background: linear-gradient(135deg, var(--light-green), var(--pale-green)); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-campground fa-5x" style="color: var(--accent-green);"></i>
                            </div>
                        <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge <?= $campground['status'] === 'available' ? 'bg-success' : 'bg-warning' ?> fs-6">
                                    <?= $campground['status'] === 'available' ? 'Tersedia' : 'Hampir Penuh' ?>
                            </span>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                <!-- Thumbnail Images -->
                <div class="row g-2">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <i class="fas fa-water fa-2x" style="color: var(--accent-green);"></i>
                                        </div>
                                    </div>
                                </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <i class="fas fa-mountain fa-2x" style="color: var(--accent-green);"></i>
                            </div>
                        </div>
                                        </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <i class="fas fa-tent fa-2x" style="color: var(--accent-green);"></i>
                                        </div>
                                    </div>
                                </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <i class="fas fa-sun fa-2x" style="color: var(--accent-green);"></i>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                        </div>
            
            <!-- Campground Info -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-3"><?= $campground['title'] ?></h2>
                        
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="text-warning me-2">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star<?= $i <= floor($campground['rating']) ? '' : '-o' ?>"></i>
                                    <?php endfor; ?>
                                </span>
                                <span class="text-muted">(<?= $campground['rating'] ?>) <?= $campground['reviews'] ?> ulasan</span>
                                        </div>
                                    </div>
                        
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt me-3" style="color: var(--accent-green); font-size: 1.2rem;"></i>
                                <div>
                                    <strong>Lokasi:</strong><br>
                                    <span class="text-muted"><?= $campground['location'] ?></span>
                                </div>

                            </div>

                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-success fw-bold"><?= $campground['price'] ?></h3>
                            <small class="text-muted">Harga sudah termasuk akses ke area campground</small>
                        </div>
                        
                        <div class="mb-4">
                            <h6>Deskripsi Campground</h6>
                            <p class="card-text">
                                <?= $campground['description'] ?>
                            </p>
                        </div>
                        
                        <div class="mb-4">
                            <h6>Fasilitas Tersedia</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <?php 
                                        $facilities = array_chunk($campground['facilities'], ceil(count($campground['facilities']) / 2));
                                        foreach ($facilities[0] as $facility): 
                                        ?>
                                        <li class="mb-2"><i class="fas fa-check me-2" style="color: var(--accent-green);"></i><?= $facility ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <?php if (isset($facilities[1])): ?>
                                        <?php foreach ($facilities[1] as $facility): ?>
                                        <li class="mb-2"><i class="fas fa-check me-2" style="color: var(--accent-green);"></i><?= $facility ?></li>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Capacity Info -->
                        <div class="mb-4">
                            <h6>Kapasitas</h6>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="border-end">
                                        <h6 class="text-success"><?= $campground['capacity']['tent'] ?></h6>
                                        <small class="text-muted">Tent</small>
                                            </div>
                                        </div>
                                <div class="col-4">
                                    <div class="border-end">
                                        <h6 class="text-success"><?= $campground['capacity']['people'] ?></h6>
                                        <small class="text-muted">Orang</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <h6 class="text-success"><?= $campground['capacity']['parking'] ?></h6>
                                    <small class="text-muted">Parkir</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg" onclick="bookCampground()" <?= $campground['status'] !== 'available' ? 'disabled' : '' ?>>
                                <i class="fas fa-calendar-check me-2"></i><?= $campground['status'] === 'available' ? 'Reservasi Sekarang' : 'Tidak Tersedia' ?>
                            </button>
                            <button class="btn btn-outline-primary btn-lg" onclick="contactCampground()">
                                <i class="fas fa-phone me-2"></i>Hubungi Kami
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Campground Details Tabs -->
<section class="py-5" style="background: linear-gradient(135deg, #f8fff8 0%, #e6ffe6 100%);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="campgroundTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">
                                    Overview
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="facilities-tab" data-bs-toggle="tab" data-bs-target="#facilities" type="button" role="tab">
                                    Fasilitas
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">
                                    Ulasan (<?= $campground['reviews'] ?>)
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="location-tab" data-bs-toggle="tab" data-bs-target="#location" type="button" role="tab">
                                    Lokasi
                                </button>
                            </li>
                        </ul>
                        
                        <div class="tab-content mt-4" id="campgroundTabsContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel">
                                <h5>Overview Campground</h5>
                                <p>
                                    <?= $campground['description'] ?>
                                </p>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <h6>Aktivitas yang Bisa Dilakukan</h6>
                                        <ul>
                                            <?php foreach ($campground['activities'] as $activity): ?>
                                            <li><?= $activity ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Waktu Terbaik Berkunjung</h6>
                                        <ul>
                                            <?php foreach ($campground['best_time'] as $time): ?>
                                            <li><?= $time ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="facilities" role="tabpanel">
                                <h5>Fasilitas Lengkap</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Fasilitas Utama</h6>
                                        <ul class="list-unstyled">
                                            <?php 
                                            $facilities = array_chunk($campground['facilities'], ceil(count($campground['facilities']) / 2));
                                            foreach ($facilities[0] as $facility): 
                                            ?>
                                            <li class="mb-2"><i class="fas fa-check me-2" style="color: var(--accent-green);"></i><?= $facility ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Fasilitas Tambahan</h6>
                                        <ul class="list-unstyled">
                                            <?php if (isset($facilities[1])): ?>
                                            <?php foreach ($facilities[1] as $facility): ?>
                                            <li class="mb-2"><i class="fas fa-check me-2" style="color: var(--accent-green);"></i><?= $facility ?></li>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <h5>Ulasan Pengunjung</h5>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h6 class="card-title mb-0">Budi Santoso</h6>
                                                    <div class="text-warning">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="card-text small">Pemandangan <?= strtolower($campground['title']) ?> yang sangat indah, udara sejuk, dan fasilitas lengkap. Perfect untuk camping keluarga!</p>
                                                <small class="text-muted">1 minggu yang lalu</small>
                                            </div>
                                        </div>
                                        
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h6 class="card-title mb-0">Siti Nurhaliza</h6>
                                                    <div class="text-warning">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="card-text small">Lokasi strategis, mudah dijangkau. Toilet bersih dan air mengalir lancar. Recommended!</p>
                                                <small class="text-muted">2 minggu yang lalu</small>
                                            </div>
                                        </div>
                                        
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h6 class="card-title mb-0">Ahmad Rizki</h6>
                                                    <div class="text-warning">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="card-text small">Sunrise dan sunset di <?= strtolower($campground['title']) ?> sangat memukau. Security juga ramah dan helpful. Will come back!</p>
                                                <small class="text-muted">3 minggu yang lalu</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="location" role="tabpanel">
                                <h5>Informasi Lokasi</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Alamat Lengkap</h6>
                                        <p><?= $campground['address'] ?></p>
                                        
                                        <h6>Koordinat GPS</h6>
                                        <p>
                                            Latitude: <?= $campground['coordinates'][0] ?><br>
                                            Longitude: <?= $campground['coordinates'][1] ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Akses Transportasi</h6>
                                        <ul>
                                            <?php foreach ($campground['access'] as $transport => $time): ?>
                                            <li><strong><?= $transport ?>:</strong> <?= $time ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        
                                        <h6>Jarak dari Kota</h6>
                                        <ul>
                                            <?php foreach ($campground['distances'] as $city => $distance): ?>
                                            <li><?= $city ?>: <?= $distance ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Campgrounds -->
<section class="py-5">
    <div class="container">
        <div class="section-title">
            <h2>Campground Lainnya</h2>
            <p>Jelajahi campground menarik lainnya dari CVI Wirotaman</p>
        </div>
        
        <div class="row g-4">
            <?php 
            $related_campgrounds = array_filter($campgrounds, function($key) use ($campground_id) {
                return $key !== $campground_id;
            }, ARRAY_FILTER_USE_KEY);
            
            $count = 0;
            foreach ($related_campgrounds as $key => $related_campground): 
                if ($count >= 3) break;
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge <?= $related_campground['status'] === 'available' ? 'bg-success' : 'bg-warning' ?>">
                                <?= $related_campground['status'] === 'available' ? 'Tersedia' : 'Hampir Penuh' ?>
                            </span>
                            <div class="text-warning">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="fas fa-star<?= $i <= floor($related_campground['rating']) ? '' : '-o' ?>"></i>
                                <?php endfor; ?>
                                <span class="ms-1"><?= $related_campground['rating'] ?></span>
                            </div>
                        </div>
                        <h5 class="card-title"><?= $related_campground['title'] ?></h5>
                        <p class="card-text">
                            <?= substr($related_campground['description'], 0, 100) ?>...
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold"><?= $related_campground['price'] ?></span>
                            <a href="<?= base_url('campground/' . $key) ?>" class="btn btn-outline-primary btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            $count++;
            endforeach; 
            ?>
        </div>
    </div>
</section>

<script>
function bookCampground() {
    alert('Fitur reservasi akan segera tersedia! Silakan hubungi kami untuk informasi lebih lanjut.');
}

function contactCampground() {
    alert('Hubungi kami di:\n- WhatsApp: +62 812-3456-7890\n- Email: info@cviwirotaman.com');
    }
</script>
</script>
</script>