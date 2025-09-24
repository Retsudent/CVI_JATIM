<?php
// Normalize data from controller
$cg = $campground ?? null;
if (!$cg) {
	$cg = [
		'id' => 1,
		'name' => 'Telaga Ngebel',
        'location' => 'Ngebel, Ponorogo, Jawa Timur',
		'price_per_person' => 0,
        'status' => 'available',
		'description' => '',
		'facilities' => []
	];
}

$title = $cg['name'] ?? '';
$status = $cg['status'] ?? 'available';
$priceText = 'Rp ' . number_format($cg['price_per_person'] ?? 0, 0, ',', '.') . '/orang';
$rating = $cg['rating'] ?? 4.8;
$reviews = $cg['reviews'] ?? 25;

// Normalize facilities into array and pre-chunk for two-column rendering
$facilitiesList = $cg['facilities'] ?? [];
if (is_string($facilitiesList)) {
	$facilitiesList = array_filter(array_map('trim', explode(',', $facilitiesList)));
}
if (!is_array($facilitiesList)) {
	$facilitiesList = [];
}
$facilitiesChunks = array_chunk($facilitiesList, max(1, (int)ceil(max(1, count($facilitiesList)) / 2)));
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
                                <span class="badge <?= $status === 'available' ? 'bg-success' : 'bg-warning' ?> fs-6">
                                    <?= $status === 'available' ? 'Tersedia' : 'Hampir Penuh' ?>
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
                        <h2 class="card-title mb-3"><?= $title ?></h2>
                        
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="text-warning me-2">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star<?= $i <= floor($rating) ? '' : '-o' ?>"></i>
                                    <?php endfor; ?>
                                </span>
                                <span class="text-muted">(<?= $rating ?>) <?= $reviews ?> ulasan</span>
                                        </div>
                                    </div>
                        
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt me-3" style="color: var(--accent-green); font-size: 1.2rem;"></i>
                                <div>
                                    <strong>Lokasi:</strong><br>
                                    <span class="text-muted"><?= $cg['location'] ?></span>
                                </div>

                            </div>

                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-success fw-bold"><?= $priceText ?></h3>
                            <small class="text-muted">Harga sudah termasuk akses ke area campground</small>
                        </div>
                        
                        
                        
                        <!-- Capacity Info -->
                        <?php if (isset($cg['capacity'])): ?>
                        <div class="mb-4">
                            <h6>Kapasitas</h6>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="border-end">
                                        <h6 class="text-success"><?= $cg['capacity']['tent'] ?></h6>
                                        <small class="text-muted">Tent</small>
                                            </div>
                                        </div>
                                <div class="col-4">
                                    <div class="border-end">
                                        <h6 class="text-success"><?= $cg['capacity']['people'] ?></h6>
                                        <small class="text-muted">Orang</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <h6 class="text-success"><?= $cg['capacity']['parking'] ?></h6>
                                    <small class="text-muted">Parkir</small>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-2">
                            <?php 
                            $msg = "Halo Admin CVI Wirotaman, saya ingin reservasi campground: " . $title . " di " . ($cg['location'] ?? '-') . ". Harga: " . $priceText;
                            $waReserve = 'https://wa.me/083134846000?text=' . urlencode($msg);
                            ?>
                            <a class="btn btn-primary btn-lg" href="<?= $waReserve ?>" target="_blank" rel="noopener">
                                <i class="fab fa-whatsapp me-2"></i>Reservasi via WhatsApp
                            </a>
                            <a class="btn btn-outline-primary btn-lg" href="<?= 'https://wa.me/083134846000?text=' . urlencode('Halo Admin, saya ingin bertanya tentang campground.') ?>" target="_blank" rel="noopener">
                                <i class="fas fa-phone me-2"></i>Hubungi via WhatsApp
                            </a>
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
                        <ul class="nav nav-tabs" id="campgroundTabs" role="tablist" style="gap: 24px; white-space: nowrap;">
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
                                    Ulasan<?= $reviews !== null ? ' (' . $reviews . ')' : '' ?>
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
                                    <?= $cg['description'] ?: ($title . ' adalah campground yang nyaman dengan suasana alam asri. Cocok untuk keluarga maupun rombongan dengan udara sejuk dan pemandangan indah.') ?>
                                </p>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <h6>Aktivitas yang Bisa Dilakukan</h6>
                                        <ul>
                                            <?php 
                                            $activities = $cg['activities'] ?? [
                                                'Camping dan tenda',
                                                'Fotografi landscape',
                                                'Jalan-jalan menikmati alam',
                                                'Stargazing di malam hari'
                                            ];
                                            foreach ($activities as $activity): ?>
                                            <li><?= $activity ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Waktu Terbaik Berkunjung</h6>
                                        <ul>
                                            <?php 
                                            $bestTime = $cg['best_time'] ?? [
                                                'Musim kemarau (April - Oktober)',
                                                'Pagi hari untuk sunrise',
                                                'Sore hari untuk sunset',
                                                'Malam hari untuk stargazing'
                                            ];
                                            foreach ($bestTime as $time): ?>
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
                                            <?php foreach ($facilitiesChunks[0] ?? [] as $facility): ?>
                                            <li class="mb-2"><i class="fas fa-check me-2" style="color: var(--accent-green);"></i><?= $facility ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Fasilitas Tambahan</h6>
                                        <ul class="list-unstyled">
                                            <?php if (isset($facilitiesChunks[1])): ?>
                                            <?php foreach ($facilitiesChunks[1] as $facility): ?>
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
                                                <p class="card-text small">Pemandangan <?= strtolower($title) ?> yang sangat indah, udara sejuk, dan fasilitas lengkap. Perfect untuk camping keluarga!</p>
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
                                                <p class="card-text small">Sunrise dan sunset di <?= strtolower($title) ?> sangat memukau. Security juga ramah dan helpful. Will come back!</p>
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
                                        <p><?= $cg['address'] ?? ($title . ', ' . ($cg['location'] ?? 'Jawa Timur')) ?></p>
                                        
                                        <h6>Koordinat GPS</h6>
                                        <p>
                                            Latitude: <?= $cg['coordinates'][0] ?? '-' ?><br>
                                            Longitude: <?= $cg['coordinates'][1] ?? '-' ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Akses Transportasi</h6>
                                        <ul>
                                            <?php 
                                            $access = $cg['access'] ?? [
                                                'Kendaraan Pribadi' => 'Akses mudah, tersedia area parkir',
                                                'Bus' => 'Terminal terdekat + ojek',
                                                'Kereta' => 'Stasiun terdekat + ojek'
                                            ];
                                            foreach ($access as $transport => $time): ?>
                                            <li><strong><?= $transport ?>:</strong> <?= $time ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        
                                        <h6>Jarak dari Kota</h6>
                                        <ul>
                                            <?php 
                                            $distances = $cg['distances'] ?? [];
                                            foreach ($distances as $city => $distance): ?>
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
			if (!empty($related_campgrounds)):
            $count = 0;
			foreach ($related_campgrounds as $related_campground): 
                if ($count >= 3) break;
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge <?= ($related_campground['status'] ?? 'available') === 'available' ? 'bg-success' : 'bg-warning' ?>">
                                <?= ($related_campground['status'] ?? 'available') === 'available' ? 'Tersedia' : 'Hampir Penuh' ?>
                            </span>
                            <?php if (isset($related_campground['rating'])): ?>
                            <div class="text-warning">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="fas fa-star<?= $i <= floor($related_campground['rating']) ? '' : '-o' ?>"></i>
                                <?php endfor; ?>
                                <span class="ms-1"><?= $related_campground['rating'] ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <h5 class="card-title"><?= $related_campground['name'] ?></h5>
                        <p class="card-text">
                            <?= substr($related_campground['description'], 0, 100) ?>...
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold">Rp <?= number_format($related_campground['price_per_person'] ?? 0, 0, ',', '.') ?>/orang</span>
                            <a href="<?= base_url('campground/detail/' . ($related_campground['id'] ?? '')) ?>" class="btn btn-outline-primary btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            $count++;
            endforeach; 
			endif;
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