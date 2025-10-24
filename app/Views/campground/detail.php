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
    // allow newline or comma separated
    $facilitiesList = array_filter(array_map('trim', preg_split('/\r?\n|,/', $facilitiesList)));
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
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body p-0">
                    <div class="position-relative">
                            <?php
                                // Resolve campground image similar to merchandise
                                $imgUrl = null;
                                if (!empty($cg['image'])) {
                                    $raw = trim((string)$cg['image']);
                                    if (preg_match('#^(https?:)?//#i', $raw)) {
                                        $imgUrl = $raw;
                                    } elseif (strpos($raw, 'assets/') !== false || strpos($raw, '/assets/') !== false) {
                                        $imgUrl = base_url($raw);
                                    } else {
                                        $imgUrl = base_url('assets/images/campground/' . $raw);
                                    }
                                }
                            ?>
                            <?php if ($imgUrl): ?>
                                <div class="campground-image" style="overflow:hidden; display:flex; align-items:center; justify-content:center; background:#f6fff6;">
                                    <img src="<?= esc($imgUrl) ?>" alt="<?= htmlspecialchars($title) ?>" style="width:100%; height:100%; object-fit:cover; display:block;" onerror="this.style.display='none'" />
                                    <div class="position-absolute top-0 end-0 m-3">
                                        <span class="badge <?= in_array(strtolower($status), ['available','active','tersedia']) ? 'bg-success' : 'bg-warning' ?> fs-6">
                                            <?= in_array(strtolower($status), ['available','active','tersedia']) ? 'Tersedia' : 'Hampir Penuh' ?>
                                        </span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="campground-placeholder" style="height: 400px; background: linear-gradient(135deg, var(--light-green), var(--pale-green)); display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-campground fa-5x" style="color: var(--accent-green);"></i>
                                </div>
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge <?= in_array(strtolower($status), ['available','active','tersedia']) ? 'bg-success' : 'bg-warning' ?> fs-6">
                                        <?= in_array(strtolower($status), ['available','active','tersedia']) ? 'Tersedia' : 'Hampir Penuh' ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    </div>
                    
                <!-- Thumbnail Images -->
                <div class="row g-2">
                    <?php
                        // Prepare up to 4 thumbnail urls. If $imgUrl exists, show it in thumbnails.
                        $thumbs = [];
                        if (!empty($imgUrl)) {
                            $thumbs[] = $imgUrl;
                        }
                        // If campground has additional gallery array, include them
                        if (!empty($cg['gallery']) && is_array($cg['gallery'])) {
                            foreach ($cg['gallery'] as $g) {
                                if (count($thumbs) >= 4) break;
                                $r = trim((string)$g);
                                if (preg_match('#^(https?:)?//#i', $r)) {
                                    $thumbs[] = $r;
                                } elseif (strpos($r, 'assets/') !== false || strpos($r, '/assets/') !== false) {
                                    $thumbs[] = base_url($r);
                                } else {
                                    $thumbs[] = base_url('assets/images/campground/' . $r);
                                }
                            }
                        }
                        // Fill remaining slots with icons
                        $iconList = ['fas fa-water','fas fa-mountain','fas fa-tent','fas fa-sun'];
                    ?>
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body p-2 text-center">
                                    <i class="<?= $iconList[$i] ?> fa-2x" style="color: var(--accent-green);"></i>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Campground Info -->
            <div class="col-lg-4">
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
                                        <h6>Kapasitas Tenda</h6>
                                        <?php
                                        // Prefer explicit column, fallback to nested capacity array
                                        $capTent = null;
                                        if (isset($cg['capacity_tent'])) {
                                            $capTent = $cg['capacity_tent'];
                                        } elseif (isset($cg['capacity']) && is_array($cg['capacity'])) {
                                            $capTent = $cg['capacity']['tent'] ?? null;
                                        }
                                        ?>
                                        <p class="lead text-success" style="font-weight:700; font-size:1.25rem;"><?= $capTent !== null && $capTent !== '' ? htmlspecialchars((string)$capTent) : '-' ?> tenda</p>
                                        <p class="text-muted">Kapasitas menunjukkan jumlah tenda maksimal yang dapat dipasang di campground ini.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Kapasitas Parkir</h6>
                                        <?php
                                        $capPark = null;
                                        if (isset($cg['capacity_parking'])) {
                                            $capPark = $cg['capacity_parking'];
                                        } elseif (isset($cg['capacity']) && is_array($cg['capacity'])) {
                                            $capPark = $cg['capacity']['parking'] ?? null;
                                        }
                                        ?>
                                        <p class="lead text-success" style="font-weight:700; font-size:1.25rem;"><?= $capPark !== null && $capPark !== '' ? htmlspecialchars((string)$capPark) : '-' ?> kendaraan</p>
                                        <p class="text-muted">Menunjukkan jumlah kendaraan yang dapat diparkir di area campground.</p>
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
                                <div class="mb-3" style="text-align: left;">
                                    <a href="/campground/review/<?= htmlspecialchars($cg['id'] ?? '') ?>" class="btn btn-success">📝 Berikan Ulasan</a>
                                </div>
                                <?php
                                $reviews = [];
                                try {
                                    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                                    $stmt = $pdo->prepare('SELECT * FROM campground_reviews WHERE campground_id = :id AND is_approved = true ORDER BY created_at DESC LIMIT 10');
                                    $stmt->execute([':id' => $cg['id'] ?? 0]);
                                    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                } catch (Throwable $e) {
                                    $reviews = [];
                                }
                                ?>
                                <?php if (empty($reviews)): ?>
                                    <div class="card">
                                        <div class="card-body text-center text-muted">
                                            Belum ada ulasan untuk campground ini. Jadilah yang pertama!
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div style="max-height: 420px; overflow-y: auto; padding-right: 6px;">
                                        <?php foreach ($reviews as $review): ?>
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <h6 class="card-title mb-0"><?= htmlspecialchars($review['customer_name']) ?></h6>
                                                        <div class="text-warning">
                                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                <i class="fas fa-star<?= $i <= (int)$review['rating'] ? '' : '-o' ;?>"></i>
                                                            <?php endfor; ?>
                                                        </div>
                                                    </div>
                                                    <?php if (!empty($review['comment'])): ?>
                                                        <p class="card-text small"><?= nl2br(htmlspecialchars($review['comment'])) ?></p>
                                                    <?php endif; ?>
                                                    <small class="text-muted"><?= date('d F Y', strtotime($review['created_at'])) ?></small>
                                                    <?php if (!empty($review['admin_response'])): ?>
                                                        <div class="mt-2 p-2" style="background: #e3f2fd; border-left: 4px solid #2196f3; border-radius: 6px;">
                                                            <strong style="color:#1976d2;">Respon Admin:</strong>
                                                            <div class="small" style="color:#1976d2;"><?= nl2br(htmlspecialchars($review['admin_response'])) ?></div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="tab-pane fade" id="location" role="tabpanel">
                                <h5>Informasi Lokasi</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Alamat Lengkap</h6>
                                        <p><?= $cg['address'] ?? ($title . ', ' . ($cg['location'] ?? 'Jawa Timur')) ?></p>
                                        
                                        <h6>Koordinat GPS</h6>
                                        <?php
                                        // Support either separate fields (coordinates_lat/coordinates_lng)
                                        // or an array stored in $cg['coordinates'] for backward compatibility.
                                        $lat = null;
                                        $lng = null;
                                        if (!empty($cg['coordinates_lat']) || !empty($cg['coordinates_lng'])) {
                                            $lat = $cg['coordinates_lat'] ?? null;
                                            $lng = $cg['coordinates_lng'] ?? null;
                                        } elseif (!empty($cg['coordinates']) && is_array($cg['coordinates'])) {
                                            $lat = $cg['coordinates'][0] ?? null;
                                            $lng = $cg['coordinates'][1] ?? null;
                                        }
                                        ?>
                                        <p>
                                            Latitude: <?= $lat !== null && $lat !== '' ? htmlspecialchars($lat) : '-' ?><br>
                                            Longitude: <?= $lng !== null && $lng !== '' ? htmlspecialchars($lng) : '-' ?>
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
                            <?php $rc_status = strtolower($related_campground['status'] ?? 'available'); ?>
                            <span class="badge <?= in_array($rc_status, ['available','active','tersedia']) ? 'bg-success' : 'bg-warning' ?>">
                                <?= in_array($rc_status, ['available','active','tersedia']) ? 'Tersedia' : 'Hampir Penuh' ?>
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

// Keep the main photo card height in sync with the Overview tabs card height.
// This measures the Overview card (the one that contains #campgroundTabs) and
// sets .campground-image height to match. Runs on load and window resize.
(function () {
    function syncCampImageHeight() {
        try {
            var tabsNav = document.getElementById('campgroundTabs');
            var imgEl = document.querySelector('.campground-image') || document.querySelector('.campground-placeholder');
            if (!tabsNav || !imgEl) return;
            var tabsCard = tabsNav.closest('.card');
            if (!tabsCard) return;
            // Compute height including padding/border
            var targetH = tabsCard.getBoundingClientRect().height;
            // Apply a reasonable min and max to avoid layout jumps
            var minH = 220; // don't shrink below this
            var maxH = Math.max(380, window.innerHeight * 0.4);
            targetH = Math.max(minH, Math.min(maxH, Math.round(targetH)));
            imgEl.style.height = targetH + 'px';
        } catch (e) {
            // fail silently
            console && console.debug && console.debug('syncCampImageHeight error', e);
        }
    }

    var resizeTimer = null;
    function debouncedSync() {
        if (resizeTimer) clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            syncCampImageHeight();
        }, 120);
    }

    document.addEventListener('DOMContentLoaded', function () {
        syncCampImageHeight();
        // small timeout to allow fonts/images to settle
        setTimeout(syncCampImageHeight, 250);
    });
    window.addEventListener('resize', debouncedSync);
})();
</script>

<!-- Removed bottom reviews section (now shown in Reviews tab) -->