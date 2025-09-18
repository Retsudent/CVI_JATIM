<?php
// Event detail page content
?>
<!-- Event Detail -->
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('event') ?>" class="text-decoration-none">Event</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= esc($event['title']) ?></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;">
                    <!-- Event Image -->
                    <div class="position-relative">
                        <img src="<?= base_url('assets/images/events/' . $event['image']) ?>" 
                             class="card-img-top" 
                             alt="<?= esc($event['title']) ?>"
                             style="height: 500px; object-fit: cover;"
                             onerror="this.src='<?= base_url('assets/images/placeholder.svg') ?>'">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-<?= $event['status'] === 'upcoming' ? 'success' : ($event['status'] === 'ongoing' ? 'warning' : 'secondary') ?> fs-6 px-3 py-2" style="border-radius: 25px;">
                                <?= ucfirst($event['status']) ?>
                            </span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100" style="background: linear-gradient(transparent, rgba(0,0,0,0.7)); height: 100px;"></div>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Event Title -->
                        <div class="mb-4">
                            <h1 class="display-5 fw-bold text-dark mb-3"><?= esc($event['title']) ?></h1>
                            
                            <!-- Event Meta Info -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                        <div class="bg-primary text-white rounded-circle p-2 me-3">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 text-muted">Lokasi</h6>
                                            <p class="mb-0 fw-semibold"><?= esc($event['location']) ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                        <div class="bg-success text-white rounded-circle p-2 me-3">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 text-muted">Tanggal</h6>
                                            <p class="mb-0 fw-semibold">
                                                <?= date('d M Y', strtotime($event['start_date'])) ?>
                                                <?php if ($event['end_date'] !== $event['start_date']): ?>
                                                    - <?= date('d M Y', strtotime($event['end_date'])) ?>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                        <div class="bg-<?= $event['price'] > 0 ? 'warning' : 'success' ?> text-white rounded-circle p-2 me-3">
                                            <i class="fas fa-<?= $event['price'] > 0 ? 'tag' : 'gift' ?>"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 text-muted">Harga</h6>
                                            <p class="mb-0 fw-semibold">
                                                <?php if ($event['price'] > 0): ?>
                                                    Rp <?= number_format($event['price'], 0, ',', '.') ?>
                                                <?php else: ?>
                                                    <span class="text-success">Gratis</span>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                        <div class="bg-info text-white rounded-circle p-2 me-3">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 text-muted">Peserta</h6>
                                            <p class="mb-0 fw-semibold">Terbuka untuk Umum</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Event Description -->
                        <div class="event-description">
                            <h4 class="fw-bold text-dark mb-3">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Deskripsi Event
                            </h4>
                            <div class="bg-light p-4 rounded-3">
                                <p class="lead mb-0"><?= nl2br(esc($event['description'])) ?></p>
                            </div>
                        </div>
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
                                Informasi Event
                            </h5>
                            
                            <div class="info-item mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-primary text-white rounded-circle p-2 me-3">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <h6 class="mb-0 fw-semibold">Waktu</h6>
                                </div>
                                <p class="text-muted mb-0 ms-5">
                                    <?= date('d M Y', strtotime($event['start_date'])) ?>
                                    <?php if ($event['end_date'] !== $event['start_date']): ?>
                                        - <?= date('d M Y', strtotime($event['end_date'])) ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                            
                            <div class="info-item mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-success text-white rounded-circle p-2 me-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h6 class="mb-0 fw-semibold">Lokasi</h6>
                                </div>
                                <p class="text-muted mb-0 ms-5"><?= esc($event['location']) ?></p>
                            </div>
                            
                            <div class="info-item mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-<?= $event['price'] > 0 ? 'warning' : 'success' ?> text-white rounded-circle p-2 me-3">
                                        <i class="fas fa-<?= $event['price'] > 0 ? 'tag' : 'gift' ?>"></i>
                                    </div>
                                    <h6 class="mb-0 fw-semibold">Harga</h6>
                                </div>
                                <p class="text-muted mb-0 ms-5">
                                    <?php if ($event['price'] > 0): ?>
                                        Rp <?= number_format($event['price'], 0, ',', '.') ?>
                                    <?php else: ?>
                                        <span class="text-success fw-bold">Gratis</span>
                                    <?php endif; ?>
                                </p>
                            </div>
                            
                            <div class="info-item mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-info text-white rounded-circle p-2 me-3">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                    <h6 class="mb-0 fw-semibold">Status</h6>
                                </div>
                                <span class="badge bg-<?= $event['status'] === 'upcoming' ? 'success' : ($event['status'] === 'ongoing' ? 'warning' : 'secondary') ?> fs-6 ms-5">
                                    <?= ucfirst($event['status']) ?>
                                </span>
                            </div>
                            
                            <hr class="my-4">
                            
                            <?php if ($event['status'] === 'upcoming'): ?>
                                <button class="btn btn-primary w-100 mb-3 py-3" style="border-radius: 15px; font-weight: 600;">
                                    <i class="fas fa-calendar-plus me-2"></i>Daftar Event
                                </button>
                            <?php endif; ?>
                            
                            <button class="btn btn-outline-primary w-100 mb-3 py-3" style="border-radius: 15px; font-weight: 600;">
                                <i class="fas fa-share-alt me-2"></i>Bagikan Event
                            </button>
                            
                            <button class="btn btn-outline-secondary w-100 py-3" style="border-radius: 15px; font-weight: 600;">
                                <i class="fas fa-heart me-2"></i>Simpan Event
                            </button>
                        </div>
                    </div>
                    
                    <!-- Related Events - Compact Version -->
                    <div class="card shadow-lg border-0" style="border-radius: 20px;">
                        <div class="card-body p-3">
                            <h6 class="card-title fw-bold text-dark mb-2">
                                <i class="fas fa-calendar-alt text-primary me-2"></i>
                                Event Lainnya
                            </h6>
                            <p class="text-muted small mb-3">Jangan lewatkan event menarik lainnya dari CVI Wirotaman.</p>
                            <a href="<?= base_url('event') ?>" class="btn btn-primary w-100 py-2" style="border-radius: 15px; font-weight: 600; font-size: 0.9rem;">
                                <i class="fas fa-list me-2"></i>Lihat Semua Event
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
// End of event detail page
?>
