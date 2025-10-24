<!-- Page Header -->
<section class="hero-section" data-animate="zoom-in">
    <div class="container">
        <div class="hero-content text-center">
            <!-- Page Icon Above Title -->
            <div class="mb-3">
                <i class="fas fa-images fa-4x" style="color: var(--accent-green);"></i>
            </div>
            
            <!-- Page Title Below Icon -->
            <h1 class="hero-title">
                Gallery
            </h1>
            <p class="hero-subtitle">
                Momen-momen terbaik dari kegiatan CVI Wirotaman
            </p>
        </div>
    </div>
</section>

<!-- Gallery Content -->
<section class="py-5" data-animate="fade-up">
    <div class="container">
        <!-- Filter Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Filter Galeri</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-outline-primary active" onclick="filterGallery('all')">
                                <i class="fas fa-th me-1"></i>Semua
                            </button>
                            <button class="btn btn-outline-primary" onclick="filterGallery('hiking')">
                                <i class="fas fa-hiking me-1"></i>Hiking
                            </button>
                            <button class="btn btn-outline-primary" onclick="filterGallery('camping')">
                                <i class="fas fa-campground me-1"></i>Camping
                            </button>
                            <button class="btn btn-outline-primary" onclick="filterGallery('nature')">
                                <i class="fas fa-leaf me-1"></i>Alam
                            </button>
                            <button class="btn btn-outline-primary" onclick="filterGallery('event')">
                                <i class="fas fa-calendar-alt me-1"></i>Event
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Gallery Grid -->
        <div class="row g-4" id="galleryGrid">
            <?php if (!empty($photos)): ?>
                <?php foreach ($photos as $p): ?>
                <div class="col-lg-4 col-md-6" data-category="event">
                    <div class="card h-100">
                        <div class="card-body p-0">
                            <div class="position-relative">
                                <img src="<?= base_url('assets/images/' . $p['image']) ?>" alt="<?= htmlspecialchars($p['title'] ?? '') ?>" style="width:100%;height:250px;object-fit:cover;">
                            </div>
                            <div class="p-3">
                                <h6 class="card-title"><?= htmlspecialchars($p['title'] ?? '') ?></h6>
                                <p class="card-text small text-muted">
                                    <?= htmlspecialchars($p['caption'] ?? '') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted">Belum ada foto di galeri.</div>
            <?php endif; ?>
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-5">
            <button class="btn btn-primary btn-lg" onclick="loadMoreImages()">
                <i class="fas fa-plus me-2"></i>Load More Images
            </button>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%); color: white;">
    <div class="container text-center">
        <h2 class="mb-4" style="color:#ffffff; text-shadow: 0 2px 6px rgba(0,0,0,0.35); font-weight:800;">Ingin Berbagi Momen Anda?</h2>
        <p class="lead mb-4" style="color:#f7f7f7; text-shadow: 0 1px 4px rgba(0,0,0,0.35); font-weight:600;">
            Kirim foto kegiatan outdoor Anda dan bagikan pengalaman dengan komunitas CVI Wirotaman.
        </p>
        <a href="<?= base_url('contact') ?>" class="btn btn-light btn-lg">
            <i class="fas fa-camera me-2"></i>Kirim Foto
        </a>
    </div>
</section>

<script>
function filterGallery(category) {
    const images = document.querySelectorAll('#galleryGrid .col-lg-4');
    const buttons = document.querySelectorAll('.btn-outline-primary');
    
    // Update active button
    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    // Filter images
    images.forEach(image => {
        const imageCategory = image.getAttribute('data-category');
        
        if (category === 'all' || imageCategory === category) {
            image.style.display = 'block';
        } else {
            image.style.display = 'none';
        }
    });
}

function loadMoreImages() {
    const loadingBtn = document.querySelector('.btn-lg');
    const originalText = loadingBtn.innerHTML;
    
    loadingBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
    loadingBtn.disabled = true;
    
    setTimeout(() => {
        loadingBtn.innerHTML = originalText;
        loadingBtn.disabled = false;
        alert('Semua gambar telah ditampilkan!');
    }, 2000);
}
</script>