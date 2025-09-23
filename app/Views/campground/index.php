<!-- Page Header -->
<section class="hero-section" data-animate="zoom-in">
    <div class="container">
        <div class="hero-content text-center">
            <!-- Page Icon Above Title -->
            <div class="mb-3">
                <i class="fas fa-campground fa-4x" style="color: var(--accent-green);"></i>
            </div>
            
            <!-- Page Title Below Icon -->
            <h1 class="hero-title">
                Campground
            </h1>
            <p class="hero-subtitle">
                Temukan tempat camping terbaik di wilayah Jawa Timur
            </p>
        </div>
    </div>
</section>

<!-- Campground Content -->
<section class="py-5" data-animate="fade-up">
    <div class="container">
        <!-- Filter Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Filter Campground</h5>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <select class="form-select" id="locationFilter">
                                    <option value="">Semua Lokasi</option>
                                    <option value="ponorogo">Ponorogo</option>
                                    <option value="ngawi">Ngawi</option>
                                    <option value="pacitan">Pacitan</option>
                                    <option value="madiun">Madiun</option>
                                    <option value="magetan">Magetan</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="priceFilter">
                                    <option value="">Semua Harga</option>
                                    <option value="low">< 20k</option>
                                    <option value="medium">20k - 50k</option>
                                    <option value="high">> 50k</option>
                                </select>
                            </div>
            <div class="col-md-6">
                                <button class="btn btn-primary w-100" onclick="filterCampgrounds()">
                                    <i class="fas fa-filter me-2"></i>Filter
                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Campground Grid -->
        <div class="row g-4" id="campgroundsGrid">
            <?php if (isset($campgrounds) && !empty($campgrounds)): ?>
                <?php foreach ($campgrounds as $campground): ?>
                <div class="col-lg-4 col-md-6" data-location="<?= strtolower(explode(',', $campground['location'])[0]) ?>" data-price="<?= $campground['price_per_person'] < 20000 ? 'low' : ($campground['price_per_person'] < 50000 ? 'medium' : 'high') ?>">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge bg-success">Tersedia</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="ms-1">4.5</span>
                                </div>
                            </div>
                            <h5 class="card-title">
                                <i class="fas fa-campground me-2" style="color: var(--accent-green);"></i>
                                <?= $campground['name'] ?>
                            </h5>
                            <p class="card-text">
                                <?= substr($campground['description'], 0, 120) ?>...
                            </p>
                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt me-1"></i><?= $campground['location'] ?>
                                </small>
                            </div>
                            <div class="mb-3">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <div class="border-end">
                                            <h6 class="text-success">4.5</h6>
                                            <small class="text-muted">Rating</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border-end">
                                            <h6 class="text-success">30+</h6>
                                            <small class="text-muted">Tent</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <h6 class="text-success">24/7</h6>
                                        <small class="text-muted">Security</small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold">Rp <?= number_format($campground['price_per_person'], 0, ',', '.') ?>/orang</span>
                                <a href="<?= base_url('campground/detail/' . $campground['id']) ?>" class="btn btn-outline-primary btn-sm">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-campground fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Tidak ada campground yang tersedia</h4>
                        <p class="text-muted">Silakan hubungi admin untuk informasi lebih lanjut.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-5">
            <button class="btn btn-primary btn-lg px-4 py-3" onclick="loadMoreCampgrounds()">
                <i class="fas fa-plus me-2"></i>Load More Campgrounds
            </button>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%); color: white;">
    <div class="container text-center">
        <h2 class="mb-4" style="color:#ffffff; text-shadow: 0 2px 6px rgba(0,0,0,0.35); font-weight:800;">Butuh Bantuan Memilih Campground?</h2>
        <p class="lead mb-4" style="color:#f7f7f7; text-shadow: 0 1px 4px rgba(0,0,0,0.35); font-weight:600;">
            Tim kami siap membantu Anda memilih campground yang sesuai dengan kebutuhan dan budget Anda.
        </p>
        <a href="<?= base_url('contact') ?>" class="btn btn-light btn-lg px-4 py-3">
            <i class="fas fa-envelope me-2"></i>Hubungi Kami
        </a>
    </div>
</section>

<script>
function filterCampgrounds() {
    const locationFilter = document.getElementById('locationFilter').value;
    const priceFilter = document.getElementById('priceFilter').value;
    const campgrounds = document.querySelectorAll('#campgroundsGrid .col-lg-4');
    
    campgrounds.forEach(campground => {
        const location = campground.getAttribute('data-location');
        const price = campground.getAttribute('data-price');
        
        let showCampground = true;
        
        if (locationFilter && location !== locationFilter) {
            showCampground = false;
        }
        
        if (priceFilter && price !== priceFilter) {
            showCampground = false;
        }
        
        campground.style.display = showCampground ? 'block' : 'none';
    });
}

function loadMoreCampgrounds() {
    const loadingBtn = document.querySelector('.btn-lg');
    const originalText = loadingBtn.innerHTML;
    
    loadingBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
    loadingBtn.disabled = true;
    
    setTimeout(() => {
        loadingBtn.innerHTML = originalText;
        loadingBtn.disabled = false;
        alert('Semua campground telah ditampilkan!');
    }, 2000);
    }
</script>