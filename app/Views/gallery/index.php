<?php
// Gallery page content
?>
<!-- Page Header -->
<section class="hero-section" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Galeri</h1>
            <p class="hero-subtitle">Momen-momen terbaik dari kegiatan CVI Wirotaman</p>
        </div>
    </div>
</section>

<!-- Gallery Content -->
<section class="py-5">
    <div class="container">
        <!-- Filter Buttons -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary active" data-filter="all">Semua</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="events">Event</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="campgrounds">Campground</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="nature">Alam</button>
                </div>
            </div>
        </div>
        
        <!-- Gallery Grid -->
        <div class="row" id="gallery-grid">
            <!-- Event Photos -->
            <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-category="events">
                <div class="card">
                    <img src="<?= base_url('assets/images/placeholder.svg') ?>" class="card-img-top" alt="Event Photo" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Anniversary CVI Wirotaman 2nd</h5>
                        <p class="card-text text-muted">Wonder Park - Tawangmangu</p>
                        <small class="text-muted">Mei 2025</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-category="events">
                <div class="card">
                    <img src="<?= base_url('assets/images/placeholder.svg') ?>" class="card-img-top" alt="Event Photo" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Happy Camp KOPDAR CVI JATIM</h5>
                        <p class="card-text text-muted">Bumi Perkemahan Karanganyar</p>
                        <small class="text-muted">Maret 2024</small>
                    </div>
                </div>
            </div>
            
            <!-- Campground Photos -->
            <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-category="campgrounds">
                <div class="card">
                    <img src="<?= base_url('assets/images/placeholder.svg') ?>" class="card-img-top" alt="Campground Photo" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Telaga Ngebel</h5>
                        <p class="card-text text-muted">Ngebel, Ponorogo</p>
                        <small class="text-muted">Campground</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-category="campgrounds">
                <div class="card">
                    <img src="<?= base_url('assets/images/placeholder.svg') ?>" class="card-img-top" alt="Campground Photo" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Gunung Lawu</h5>
                        <p class="card-text text-muted">Magetan</p>
                        <small class="text-muted">Campground</small>
                    </div>
                </div>
            </div>
            
            <!-- Nature Photos -->
            <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-category="nature">
                <div class="card">
                    <img src="<?= base_url('assets/images/placeholder.svg') ?>" class="card-img-top" alt="Nature Photo" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Sunrise di Gunung Lawu</h5>
                        <p class="card-text text-muted">Magetan</p>
                        <small class="text-muted">Alam</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-category="nature">
                <div class="card">
                    <img src="<?= base_url('assets/images/placeholder.svg') ?>" class="card-img-top" alt="Nature Photo" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Pemandangan Telaga Ngebel</h5>
                        <p class="card-text text-muted">Ngebel, Ponorogo</p>
                        <small class="text-muted">Alam</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-category="events">
                <div class="card">
                    <img src="<?= base_url('assets/images/placeholder.svg') ?>" class="card-img-top" alt="Event Photo" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Hiking Bersama</h5>
                        <p class="card-text text-muted">Gunung Lawu</p>
                        <small class="text-muted">Aktivitas</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-category="campgrounds">
                <div class="card">
                    <img src="<?= base_url('assets/images/placeholder.svg') ?>" class="card-img-top" alt="Campground Photo" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Area Camping</h5>
                        <p class="card-text text-muted">Telaga Ngebel</p>
                        <small class="text-muted">Fasilitas</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-category="nature">
                <div class="card">
                    <img src="<?= base_url('assets/images/placeholder.svg') ?>" class="card-img-top" alt="Nature Photo" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Flora dan Fauna</h5>
                        <p class="card-text text-muted">Kawasan Konservasi</p>
                        <small class="text-muted">Keanekaragaman</small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Load More Button -->
        <div class="row">
            <div class="col-12 text-center">
                <button class="btn btn-outline-primary" id="load-more">
                    <i class="fas fa-plus me-2"></i>Muat Lebih Banyak
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    // Gallery filter functionality
    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            document.querySelectorAll('[data-filter]').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter gallery items
            document.querySelectorAll('.gallery-item').forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
    
    // Load more functionality
    document.getElementById('load-more').addEventListener('click', function() {
        alert('Fitur "Muat Lebih Banyak" akan segera tersedia!');
    });
</script>
<?php
// End of gallery page
?>

