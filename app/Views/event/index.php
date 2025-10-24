<!-- Page Header -->
<section class="hero-section" data-animate="zoom-in">
    <div class="container">
        <div class="hero-content text-center">
            <!-- Page Icon Above Title -->
            <div class="mb-3">
                <i class="fas fa-calendar-alt fa-4x" style="color: var(--accent-green);"></i>
            </div>
            
            <!-- Page Title Below Icon -->
            <h1 class="hero-title">
                Events
            </h1>
            <p class="hero-subtitle">
                Jelajahi berbagai event menarik dari CVI Wirotaman
            </p>
        </div>
    </div>
</section>

<!-- Events Content -->
<section class="py-5" data-animate="fade-up">
    <div class="container">
        <!-- Filter Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Filter Events</h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <select class="form-select" id="categoryFilter">
                                    <option value="">Semua Kategori</option>
                                    <option value="camping">Camping</option>
                                    <option value="anniversary">Anniversary</option>
                                    <option value="halal">Halal Bi Halal</option>
                                    <option value="ramadhan">Ramadhan</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" id="statusFilter">
                                    <option value="">Semua Status</option>
                                    <option value="upcoming">Upcoming</option>
                                    <option value="ongoing">Ongoing</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary w-100" onclick="filterEvents()">
                                    <i class="fas fa-filter me-2"></i>Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Events Grid -->
        <div class="row g-4" id="eventsGrid">
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="col-lg-4 col-md-6" data-category="camping" data-status="<?= $event['status'] ?>">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <?php
                                    $badgeClass = 'bg-secondary';
                                    $badgeText = 'Unknown';
                                    switch ($event['status']) {
                                        case 'upcoming':
                                            $badgeClass = 'bg-success';
                                            $badgeText = 'Upcoming';
                                            break;
                                        case 'ongoing':
                                            $badgeClass = 'bg-warning';
                                            $badgeText = 'Ongoing';
                                            break;
                                        case 'completed':
                                            $badgeClass = 'bg-secondary';
                                            $badgeText = 'Completed';
                                            break;
                                        case 'cancelled':
                                            $badgeClass = 'bg-danger';
                                            $badgeText = 'Cancelled';
                                            break;
                                    }
                                    ?>
                                    <span class="badge <?= $badgeClass ?>"><?= $badgeText ?></span>
                                    <small class="text-muted">
                                        <?= date('d-m-Y', strtotime($event['start_date'])) ?>
                                        <?php if ($event['end_date'] && $event['end_date'] != $event['start_date']): ?>
                                            - <?= date('d-m-Y', strtotime($event['end_date'])) ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                                <h5 class="card-title"><?= htmlspecialchars($event['title']) ?></h5>
                                <p class="card-text">
                                    <?= htmlspecialchars(substr($event['description'], 0, 150)) ?>
                                    <?php if (strlen($event['description']) > 150): ?>...<?php endif; ?>
                                </p>
                                <div class="mb-3">
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt me-1"></i><?= htmlspecialchars($event['location']) ?>
                                    </small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <?php if ($event['price'] && $event['price'] > 0): ?>
                                        <span class="text-success fw-bold">Rp <?= number_format($event['price'], 0, ',', '.') ?></span>
                                    <?php else: ?>
                                        <span class="text-muted">Gratis</span>
                                    <?php endif; ?>
                                    <a href="<?= base_url('event/detail/' . $event['id']) ?>" class="btn btn-primary btn-sm">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Belum ada event tersedia</h4>
                        <p class="text-muted">Event akan segera ditambahkan. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-5">
            <button class="btn btn-primary btn-lg px-4 py-3" onclick="loadMoreEvents()">
                <i class="fas fa-plus me-2"></i>Load More Events
            </button>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%); color: white;">
    <div class="container text-center">
        <h2 class="mb-4" style="color:#ffffff; text-shadow: 0 2px 6px rgba(0,0,0,0.35); font-weight:800;">
            Tidak Menemukan Event yang Cocok?
        </h2>
        <p class="lead mb-4" style="color:#f7f7f7; text-shadow: 0 1px 4px rgba(0,0,0,0.35); font-weight:600;">
            Hubungi kami untuk informasi event terbaru atau saran event yang Anda inginkan.
        </p>
        <a href="<?= base_url('contact') ?>" class="btn btn-light btn-lg px-4 py-3">
            <i class="fas fa-envelope me-2"></i>Hubungi Kami
        </a>
    </div>
</section>

<script>
function filterEvents() {
    const categoryFilter = document.getElementById('categoryFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const events = document.querySelectorAll('#eventsGrid .col-lg-4');
    
    events.forEach(event => {
        const category = event.getAttribute('data-category');
        const status = event.getAttribute('data-status');
        
        let showEvent = true;
        
        if (categoryFilter && category !== categoryFilter) {
            showEvent = false;
        }
        
        if (statusFilter && status !== statusFilter) {
            showEvent = false;
        }
        
        event.style.display = showEvent ? 'block' : 'none';
    });
}

function loadMoreEvents() {
    // Simulate loading more events
    const loadingBtn = document.querySelector('.btn-lg');
    const originalText = loadingBtn.innerHTML;
    
    loadingBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
    loadingBtn.disabled = true;
    
    setTimeout(() => {
        loadingBtn.innerHTML = originalText;
        loadingBtn.disabled = false;
        alert('Semua event telah ditampilkan!');
    }, 2000);
}
</script>