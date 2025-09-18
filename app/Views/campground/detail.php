<?php
// Campground detail page content
?>
<!-- Campground Detail -->
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('campground') ?>" class="text-decoration-none">Campground</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= esc($campground['name']) ?></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;">
                    <!-- Campground Image -->
                    <div class="position-relative">
                        <img src="<?= base_url('assets/images/campgrounds/' . $campground['image']) ?>" 
                             class="card-img-top" 
                             alt="<?= esc($campground['name']) ?>"
                             style="height: 500px; object-fit: cover;"
                             onerror="this.src='<?= base_url('assets/images/placeholder.svg') ?>'">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-<?= $campground['status'] === 'active' ? 'success' : ($campground['status'] === 'maintenance' ? 'warning' : 'secondary') ?> fs-6 px-3 py-2" style="border-radius: 25px;">
                                <?= ucfirst($campground['status']) ?>
                            </span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100" style="background: linear-gradient(transparent, rgba(0,0,0,0.7)); height: 100px;"></div>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Campground Title -->
                        <div class="mb-4">
                            <h1 class="display-5 fw-bold text-dark mb-3"><?= esc($campground['name']) ?></h1>
                            
                            <!-- Campground Meta Info -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                        <div class="bg-primary text-white rounded-circle p-2 me-3">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 text-muted">Lokasi</h6>
                                            <p class="mb-0 fw-semibold"><?= esc($campground['location']) ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                        <div class="bg-success text-white rounded-circle p-2 me-3">
                                            <i class="fas fa-tag"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 text-muted">Harga per Orang</h6>
                                            <p class="mb-0 fw-semibold">Rp <?= number_format($campground['price_per_person'], 0, ',', '.') ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                        <div class="bg-info text-white rounded-circle p-2 me-3">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 text-muted">Status</h6>
                                            <p class="mb-0 fw-semibold"><?= ucfirst($campground['status']) ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                        <div class="bg-warning text-white rounded-circle p-2 me-3">
                                            <i class="fas fa-campground"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 text-muted">Tipe</h6>
                                            <p class="mb-0 fw-semibold">Campground</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Campground Description -->
                        <div class="campground-description mb-4">
                            <h4 class="fw-bold text-dark mb-3">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Deskripsi Campground
                            </h4>
                            <div class="bg-light p-4 rounded-3">
                                <p class="lead mb-0"><?= nl2br(esc($campground['description'])) ?></p>
                            </div>
                        </div>
                        
                        <!-- Facilities Section -->
                        <?php if ($campground['facilities']): ?>
                        <div class="facilities-section mb-4">
                            <h4 class="fw-bold text-dark mb-3">
                                <i class="fas fa-list-check text-primary me-2"></i>
                                Fasilitas
                            </h4>
                            <div class="row g-3">
                                <?php 
                                $facilities = explode(',', $campground['facilities']);
                                foreach ($facilities as $facility): 
                                ?>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                            <div class="bg-success text-white rounded-circle p-2 me-3">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <span class="fw-semibold"><?= esc(trim($facility)) ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="sticky-sidebar">
                    <!-- Action Card -->
                    <div class="card shadow-lg border-0 mb-4" style="border-radius: 20px; margin-top: 40px;">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold text-dark mb-4">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Informasi Booking
                            </h5>
                            
                            <div class="info-item mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-primary text-white rounded-circle p-2 me-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h6 class="mb-0 fw-semibold">Lokasi</h6>
                                </div>
                                <p class="text-muted mb-0 ms-5"><?= esc($campground['location']) ?></p>
                            </div>
                            
                            <div class="info-item mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-success text-white rounded-circle p-2 me-3">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                    <h6 class="mb-0 fw-semibold">Harga per Orang</h6>
                                </div>
                                <p class="text-muted mb-0 ms-5">Rp <?= number_format($campground['price_per_person'], 0, ',', '.') ?></p>
                            </div>
                            
                            <div class="info-item mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-info text-white rounded-circle p-2 me-3">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                    <h6 class="mb-0 fw-semibold">Status</h6>
                                </div>
                                <span class="badge bg-<?= $campground['status'] === 'active' ? 'success' : ($campground['status'] === 'maintenance' ? 'warning' : 'secondary') ?> fs-6 ms-5">
                                    <?= ucfirst($campground['status']) ?>
                                </span>
                            </div>
                            
                            <?php if ($campground['contact_info']): ?>
                            <div class="info-item mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-warning text-white rounded-circle p-2 me-3">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <h6 class="mb-0 fw-semibold">Kontak</h6>
                                </div>
                                <p class="text-muted mb-0 ms-5"><?= esc($campground['contact_info']) ?></p>
                            </div>
                            <?php endif; ?>
                            
                            <hr class="my-4">
                            
                            <?php if ($campground['status'] === 'active'): ?>
                                <button class="btn btn-primary w-100 mb-3 py-3" onclick="bookCampground(<?= $campground['id'] ?>)" style="border-radius: 15px; font-weight: 600;">
                                    <i class="fas fa-calendar-plus me-2"></i>Booking Sekarang
                                </button>
                            <?php else: ?>
                                <button class="btn btn-secondary w-100 mb-3 py-3" disabled style="border-radius: 15px; font-weight: 600;">
                                    <i class="fas fa-times me-2"></i>Tidak Tersedia
                                </button>
                            <?php endif; ?>
                            
                            <button class="btn btn-outline-primary w-100 mb-3 py-3" style="border-radius: 15px; font-weight: 600;">
                                <i class="fas fa-share-alt me-2"></i>Bagikan Campground
                            </button>
                            
                            <button class="btn btn-outline-secondary w-100 py-3" style="border-radius: 15px; font-weight: 600;">
                                <i class="fas fa-heart me-2"></i>Simpan Campground
                            </button>
                        </div>
                    </div>
                    
                    <!-- Related Campgrounds - Compact Version -->
                    <div class="card shadow-lg border-0" style="border-radius: 20px;">
                        <div class="card-body p-3">
                            <h6 class="card-title fw-bold text-dark mb-2">
                                <i class="fas fa-campground text-primary me-2"></i>
                                Campground Lainnya
                            </h6>
                            <p class="text-muted small mb-3">Jelajahi campground menarik lainnya di wilayah Jawa Timur.</p>
                            <a href="<?= base_url('campground') ?>" class="btn btn-primary w-100 py-2" style="border-radius: 15px; font-weight: 600; font-size: 0.9rem;">
                                <i class="fas fa-list me-2"></i>Lihat Semua Campground
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function bookCampground(campgroundId) {
        // This would typically redirect to booking page or open booking modal
        alert('Fitur booking akan segera tersedia!');
    }
</script>
<?php
// End of campground detail page
?>
