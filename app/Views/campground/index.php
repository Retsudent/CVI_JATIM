<?php
// Campground index page content
?>
<!-- Page Header -->
<section class="hero-section" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Campground</h1>
            <p class="hero-subtitle">Temukan tempat camping terbaik di wilayah Jawa Timur</p>
        </div>
    </div>
</section>

<!-- Campground List -->
<section class="py-5">
    <div class="container">
        <!-- Filter Section -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari campground..." id="searchInput">
                    <button class="btn btn-outline-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <select class="form-select" id="locationFilter">
                    <option value="">Semua Lokasi</option>
                    <option value="Ngawi">Ngawi</option>
                    <option value="Ponorogo">Ponorogo</option>
                    <option value="Pacitan">Pacitan</option>
                    <option value="Madiun">Madiun</option>
                    <option value="Magetan">Magetan</option>
                </select>
            </div>
        </div>
        
        <div class="row" id="campgroundGrid">
            <?php if (!empty($campgrounds)): ?>
                <?php foreach ($campgrounds as $campground): ?>
                    <div class="col-lg-4 col-md-6 mb-4 campground-item" data-location="<?= esc($campground['location']) ?>">
                        <div class="card">
                            <div class="position-relative">
                                <img src="<?= base_url('assets/images/campgrounds/' . $campground['image']) ?>" 
                                     class="card-img-top" 
                                     alt="<?= esc($campground['name']) ?>"
                                     onerror="this.src='<?= base_url('assets/images/placeholder.svg') ?>'">
                                <?php if ($campground['status'] === 'maintenance'): ?>
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-warning">Maintenance</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($campground['name']) ?></h5>
                                <p class="card-text"><?= esc(substr($campground['description'], 0, 120)) ?>...</p>
                                
                                <div class="campground-info mb-3">
                                    <p class="text-muted small mb-1">
                                        <i class="fas fa-map-marker-alt me-1"></i><?= esc($campground['location']) ?>
                                    </p>
                                    <p class="text-muted small mb-1">
                                        <i class="fas fa-tag me-1"></i>Rp <?= number_format($campground['price_per_person'], 0, ',', '.') ?>/orang
                                    </p>
                                    <?php if ($campground['facilities']): ?>
                                        <p class="text-muted small mb-1">
                                            <i class="fas fa-list me-1"></i><?= esc(substr($campground['facilities'], 0, 50)) ?>...
                                        </p>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="d-flex gap-2">
                                    <a href="<?= base_url('campground/detail/' . $campground['id']) ?>" class="btn btn-primary flex-fill">Lihat Detail</a>
                                    <?php if ($campground['status'] === 'active'): ?>
                                        <button class="btn btn-outline-primary" onclick="bookCampground(<?= $campground['id'] ?>)">
                                            <i class="fas fa-calendar-plus"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <div class="py-5">
                        <i class="fas fa-campground fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Belum Ada Campground</h4>
                        <p class="text-muted">Campground akan segera hadir. Pantau terus website kami!</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
// End of campground index page
?>

<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const items = document.querySelectorAll('.campground-item');
        
        items.forEach(item => {
            const title = item.querySelector('.card-title').textContent.toLowerCase();
            const description = item.querySelector('.card-text').textContent.toLowerCase();
            const location = item.querySelector('.campground-info').textContent.toLowerCase();
            
            if (title.includes(searchTerm) || description.includes(searchTerm) || location.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
    
    // Location filter
    document.getElementById('locationFilter').addEventListener('change', function() {
        const selectedLocation = this.value;
        const items = document.querySelectorAll('.campground-item');
        
        items.forEach(item => {
            const location = item.getAttribute('data-location');
            
            if (selectedLocation === '' || location.includes(selectedLocation)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
    
    // Book campground function
    function bookCampground(campgroundId) {
        // This would typically redirect to booking page or open booking modal
        alert('Fitur booking akan segera tersedia!');
    }
</script>
