<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">CVI WIROTAMAN</h1>
            <p class="hero-subtitle">Komunitas Pecinta Alam Jawa Timur</p>
            <div class="hero-locations">
                <span class="location-badge">Ngawi</span>
                <span class="location-badge">Ponorogo</span>
                <span class="location-badge">Pacitan</span>
                <span class="location-badge">Madiun</span>
                <span class="location-badge">Magetan</span>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-umbrella-beach"></i>
                    </div>
                    <h5>Beach</h5>
                    <p>Pantai-pantai indah di Pacitan dengan pemandangan sunset yang menakjubkan</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <h5>Mountain</h5>
                    <p>Gunung-gunung tinggi dengan udara sejuk dan pemandangan yang memukau</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-water"></i>
                    </div>
                    <h5>Sea</h5>
                    <p>Lautan biru yang luas dengan berbagai aktivitas air yang menyenangkan</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-sun"></i>
                    </div>
                    <h5>Sunset</h5>
                    <p>Momen sunset yang indah di berbagai lokasi strategis</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Events Section -->
<section class="py-5">
    <div class="container">
        <div class="section-title">
            <h2>Event Terbaru</h2>
            <p>Ikuti berbagai event menarik dari CVI Wirotaman</p>
        </div>
        
        <div class="row">
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <img src="<?= base_url('assets/images/events/' . $event['image']) ?>" 
                                 class="card-img-top" 
                                 alt="<?= esc($event['title']) ?>"
                                 onerror="this.src='<?= base_url('assets/images/placeholder.svg') ?>'">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($event['title']) ?></h5>
                                <p class="card-text"><?= esc(substr($event['description'], 0, 100)) ?>...</p>
                                <p class="text-muted small">
                                    <i class="fas fa-map-marker-alt me-1"></i><?= esc($event['location']) ?><br>
                                    <i class="fas fa-calendar me-1"></i><?= date('d M Y', strtotime($event['start_date'])) ?>
                                </p>
                                <a href="<?= base_url('event/detail/' . $event['id']) ?>" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada event yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?= base_url('event') ?>" class="btn btn-outline-primary">Lihat Semua Event</a>
        </div>
    </div>
</section>

<!-- Merchandise Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Merchandise Event</h2>
            <p>Dapatkan merchandise eksklusif dari event-event kami</p>
        </div>
        
        <div class="row">
            <?php if (!empty($merchandise)): ?>
                <?php foreach ($merchandise as $item): ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <img src="<?= base_url('assets/images/merchandise/' . $item['image']) ?>" 
                                 class="card-img-top" 
                                 alt="<?= esc($item['name']) ?>"
                                 onerror="this.src='<?= base_url('assets/images/placeholder.svg') ?>'">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($item['name']) ?></h5>
                                <p class="card-text"><?= esc(substr($item['description'], 0, 80)) ?>...</p>
                                <div class="price-tag">Rp <?= number_format($item['price'], 0, ',', '.') ?></div>
                                <a href="<?= base_url('merchandise/detail/' . $item['id']) ?>" class="btn btn-primary mt-2">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada merchandise yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?= base_url('merchandise') ?>" class="btn btn-outline-primary">Lihat Semua Merchandise</a>
        </div>
    </div>
</section>

<!-- Campground Section -->
<section class="py-5">
    <div class="container">
        <div class="section-title">
            <h2>Campground</h2>
            <p>Temukan tempat camping terbaik di wilayah kami</p>
        </div>
        
        <div class="row">
            <?php if (!empty($campgrounds)): ?>
                <?php foreach ($campgrounds as $campground): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <img src="<?= base_url('assets/images/campgrounds/' . $campground['image']) ?>" 
                                 class="card-img-top" 
                                 alt="<?= esc($campground['name']) ?>"
                                 onerror="this.src='<?= base_url('assets/images/placeholder.svg') ?>'">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($campground['name']) ?></h5>
                                <p class="card-text"><?= esc(substr($campground['description'], 0, 100)) ?>...</p>
                                <p class="text-muted small">
                                    <i class="fas fa-map-marker-alt me-1"></i><?= esc($campground['location']) ?><br>
                                    <i class="fas fa-tag me-1"></i>Rp <?= number_format($campground['price_per_person'], 0, ',', '.') ?>/orang
                                </p>
                                <a href="<?= base_url('campground/detail/' . $campground['id']) ?>" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada campground yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?= base_url('campground') ?>" class="btn btn-outline-primary">Lihat Semua Campground</a>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
