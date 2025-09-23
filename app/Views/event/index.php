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
            <!-- Event 1 - Happy Camp KOPDAR CVI JATIM -->
            <div class="col-lg-4 col-md-6" data-category="camping" data-status="completed">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-secondary">Completed</span>
                            <small class="text-muted">02-03 Mar 2024</small>
                        </div>
                        <h5 class="card-title">Happy Camp KOPDAR CVI JATIM</h5>
                        <p class="card-text">
                            Kopdar dan camping bersama komunitas CVI Jawa Timur di Bumi Perkemahan Karanganyar. 
                            Acara yang penuh dengan kebersamaan dan semangat komunitas.
                        </p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt me-1"></i>Bumi Perkemahan Karanganyar
                            </small>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-users me-1"></i>50+ peserta
                            </small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Event Selesai</span>
                            <a href="<?= base_url('event/happy-camp') ?>" class="btn btn-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Event 2 - Camping Menyambut Ramadhan -->
            <div class="col-lg-4 col-md-6" data-category="ramadhan" data-status="upcoming">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-success">Upcoming</span>
                            <small class="text-muted">22-23 Feb 2025</small>
                        </div>
                        <h5 class="card-title">Camping Menyambut Ramadhan CVI WIROTAMAN 2025</h5>
                        <p class="card-text">
                            Camping khusus menyambut bulan suci Ramadhan di Danau Telaga Ngebel. 
                            Acara yang penuh dengan nuansa spiritual dan kebersamaan.
                        </p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt me-1"></i>Danau Telaga Ngebel, Ponorogo
                            </small>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-users me-1"></i>Max 40 peserta
                            </small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold">Rp 75.000</span>
                            <a href="<?= base_url('event/camping-ramadhan') ?>" class="btn btn-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Event 3 - Anniversary CVI Wirotaman 2nd -->
            <div class="col-lg-4 col-md-6" data-category="anniversary" data-status="upcoming">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-success">Upcoming</span>
                            <small class="text-muted">10-11 May 2025</small>
                        </div>
                        <h5 class="card-title">Anniversary CVI Wirotaman 2nd</h5>
                        <p class="card-text">
                            Perayaan ulang tahun ke-2 CVI Wirotaman di Wonder Park Tawangmangu. 
                            Acara spesial dengan berbagai kegiatan seru dan merchandise eksklusif.
                        </p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt me-1"></i>Wonder Park - Tawangmangu
                            </small>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-users me-1"></i>Max 100 peserta
                            </small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold">Rp 150.000</span>
                            <a href="<?= base_url('event/anniversary-2nd') ?>" class="btn btn-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Event 4 - Halal Bi Halal CVI WIROTAMAN 2025 -->
            <div class="col-lg-4 col-md-6" data-category="halal" data-status="upcoming">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-success">Upcoming</span>
                            <small class="text-muted">12-13 Apr 2025</small>
                        </div>
                        <h5 class="card-title">Halal Bi Halal CVI WIROTAMAN 2025</h5>
                        <p class="card-text">
                            Acara Halal Bi Halal komunitas CVI Wirotaman di Bumi Perkemahan Gembira. 
                            Momen silaturahmi dan kebersamaan setelah Ramadhan.
                        </p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt me-1"></i>Bumi Perkemahan Gembira
                            </small>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-users me-1"></i>Max 60 peserta
                            </small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold">Rp 100.000</span>
                            <a href="<?= base_url('event/halal-bi-halal') ?>" class="btn btn-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
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