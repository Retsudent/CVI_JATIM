<!-- Hero Section with Background Carousel -->
<section class="hero-section hero-carousel-section">
           <!-- Background Image Carousel -->
           <div class="hero-carousel">
                <div class="carousel-slide active" style="background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=1920&q=80');">
                    <div class="carousel-overlay"></div>
                </div>
                <div class="carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?auto=format&fit=crop&w=1920&q=80');">
                    <div class="carousel-overlay"></div>
                </div>
                <div class="carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=1920&q=80');">
                    <div class="carousel-overlay"></div>
                </div>
                <div class="carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1511497584788-876760111969?auto=format&fit=crop&w=1920&q=80');">
                    <div class="carousel-overlay"></div>
                </div>
                <div class="carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1464822759844-d150ad2bf349?auto=format&fit=crop&w=1920&q=80');">
                    <div class="carousel-overlay"></div>
                </div>
            </div>

           <!-- Floating Particles -->
           <div class="floating-particles">
               <div class="particle"></div>
               <div class="particle"></div>
               <div class="particle"></div>
               <div class="particle"></div>
               <div class="particle"></div>
           </div>
    
    <!-- Carousel Navigation Dots -->
    <div class="carousel-dots">
        <span class="dot active" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
    </div>
    
    <!-- Hero Content -->
    <div class="container">
<div class="hero-content text-center" data-animate="zoom-in">
                   <!-- Logo Section -->
                   <div class="mb-4">
                       <i class="fas fa-mountain fa-4x hero-logo" style="color: var(--accent-green);"></i>
                   </div>
            
            <!-- Title Section -->
            <h1 class="hero-title">
                CVI WIROTAMAN
            </h1>
            
            <!-- Subtitle -->
            <p class="hero-subtitle">
                Ngawi - Ponorogo - Pacitan - Madiun - Magetan
            </p>
            
            <!-- Action Buttons -->
            <div class="mt-5">
<div class="row justify-content-center g-3" data-animate="fade-up">
                    <div class="col-auto">
                        <a href="<?= base_url('about') ?>" class="btn btn-primary btn-lg px-4 py-3">
                            <i class="fas fa-info-circle me-2"></i>Tentang Kami
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('event') ?>" class="btn btn-outline-primary btn-lg px-4 py-3">
                            <i class="fas fa-calendar-alt me-2"></i>Lihat Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- Quick Stats Section -->
    <section class="quick-stats-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-card text-center">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-mountain fa-2x" style="color: var(--accent-green);"></i>
                        </div>
                        <h3 class="stat-number"><?= isset($stats['kabupaten']) ? (int)$stats['kabupaten'] : 0 ?></h3>
                        <p class="stat-label">Kabupaten</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card text-center">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-campground fa-2x" style="color: var(--accent-green);"></i>
                        </div>
                        <h3 class="stat-number"><?= isset($stats['campgrounds']) ? (int)$stats['campgrounds'] : 0 ?></h3>
                        <p class="stat-label">Campground</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card text-center">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-calendar-alt fa-2x" style="color: var(--accent-green);"></i>
                        </div>
                        <h3 class="stat-number"><?= isset($stats['events']) ? (int)$stats['events'] : 0 ?></h3>
                        <p class="stat-label">Events</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card text-center">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-users fa-2x" style="color: var(--accent-green);"></i>
                        </div>
                        <h3 class="stat-number"><?= isset($stats['members']) ? (int)$stats['members'] : 0 ?></h3>
                        <p class="stat-label">Memories</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Highlights Section -->
    <section class="highlights-section py-5">
        <div class="container">
            <div class="row align-items-center g-5 flex-lg-row">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="highlights-content pe-lg-4">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge-circle me-3"><i class="fas fa-star"></i></span>
                            <h2 class="highlights-title m-0">Pengalaman Outdoor Terbaik</h2>
                        </div>
                        <p class="highlights-description">
                            Jelajahi keindahan alam Jawa Timur dengan panduan profesional dan fasilitas terbaik. 
                            Dari pegunungan yang megah hingga pantai yang menawan, setiap perjalanan akan menjadi kenangan tak terlupakan.
                        </p>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="fas fa-user-shield"></i>
                                    <span>Panduan Profesional</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="fas fa-toolbox"></i>
                                    <span>Fasilitas Lengkap</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Keamanan Terjamin</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="fas fa-route"></i>
                                    <span>Rute Variatif & Seru</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="highlights-image card-frame mx-auto">
                        <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
                        <img 
                            src="https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?auto=format&fit=crop&w=1600&q=80" 
                            alt="Camping di alam terbuka dengan pegunungan" 
                            class="w-100 h-100 object-cover parallax-lite">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="section-title">
            <h2>Mengapa Memilih CVI Wirotaman?</h2>
            <p>Kami menawarkan pengalaman outdoor yang tak terlupakan dengan standar keamanan dan kualitas terbaik</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-shield-alt fa-3x" style="color: var(--accent-green);"></i>
                        </div>
                        <h5 class="card-title">Keamanan Terjamin</h5>
                        <p class="card-text">
                            Semua kegiatan kami dilengkapi dengan protokol keamanan yang ketat dan peralatan standar internasional.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x" style="color: var(--accent-green);"></i>
                        </div>
                        <h5 class="card-title">Komunitas Solid</h5>
                        <p class="card-text">
                            Bergabunglah dengan komunitas yang solid dan saling mendukung dalam setiap petualangan outdoor.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-leaf fa-3x" style="color: var(--accent-green);"></i>
                        </div>
                        <h5 class="card-title">Ramah Lingkungan</h5>
                        <p class="card-text">
                            Kami berkomitmen untuk melestarikan alam dan mengajarkan prinsip-prinsip konservasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Events Section -->
<section class="py-5" style="background: linear-gradient(135deg, #f8fff8 0%, #e6ffe6 100%);">
    <div class="container">
        <div class="section-title">
            <h2>Events Terbaru</h2>
            <p>Jelajahi berbagai kegiatan menarik yang kami selenggarakan</p>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="col-lg-4 col-md-6">
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
                                    <?= htmlspecialchars(substr($event['description'], 0, 100)) ?>
                                    <?php if (strlen($event['description']) > 100): ?>...<?php endif; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt me-1"></i><?= htmlspecialchars($event['location']) ?>
                                    </small>
                                    <a href="<?= base_url('event/detail/' . $event['id']) ?>" class="btn btn-outline-primary btn-sm">Detail</a>
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
        
        <div class="text-center mt-4">
            <a href="<?= base_url('event') ?>" class="btn btn-primary btn-lg">
                <i class="fas fa-calendar-alt me-2"></i>Lihat Semua Events
            </a>
        </div>
    </div>
</section>

<!-- Sponsors Section -->
<section class="sponsors-section py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>Sponsor & Kerja Sama</h2>
            <p>Terima kasih kepada para sponsor dan mitra yang telah mendukung kegiatan CVI Wirotaman</p>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Sponsor 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="sponsor-card">
                    <div class="sponsor-logo">
                        <i class="fas fa-mountain fa-4x" style="color: var(--accent-green);"></i>
                        </div>
                    <h5 class="sponsor-name">Pemerintah Provinsi Jawa Timur</h5>
                    <p class="sponsor-type">Pemerintah</p>
                            </div>
                        </div>
            
            <!-- Sponsor 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="sponsor-card">
                    <div class="sponsor-logo">
                        <i class="fas fa-building fa-4x" style="color: var(--accent-green);"></i>
                    </div>
                    <h5 class="sponsor-name">Pemkab Ngawi</h5>
                    <p class="sponsor-type">Pemerintah Daerah</p>
                    </div>
            </div>
            
            <!-- Sponsor 3 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="sponsor-card">
                    <div class="sponsor-logo">
                        <i class="fas fa-university fa-4x" style="color: var(--accent-green);"></i>
                    </div>
                    <h5 class="sponsor-name">Universitas Negeri Malang</h5>
                    <p class="sponsor-type">Pendidikan</p>
                </div>
            </div>
            
            <!-- Sponsor 4 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="sponsor-card">
                    <div class="sponsor-logo">
                        <i class="fas fa-store fa-4x" style="color: var(--accent-green);"></i>
                        </div>
                    <h5 class="sponsor-name">Alfamart</h5>
                    <p class="sponsor-type">Retail</p>
                            </div>
                        </div>
            
            <!-- Sponsor 5 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="sponsor-card">
                    <div class="sponsor-logo">
                        <i class="fas fa-car fa-4x" style="color: var(--accent-green);"></i>
                    </div>
                    <h5 class="sponsor-name">Toyota Astra Motor</h5>
                    <p class="sponsor-type">Otomotif</p>
                    </div>
            </div>
            
            <!-- Sponsor 6 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="sponsor-card">
                    <div class="sponsor-logo">
                        <i class="fas fa-utensils fa-4x" style="color: var(--accent-green);"></i>
                    </div>
                    <h5 class="sponsor-name">Warung Makan Sederhana</h5>
                    <p class="sponsor-type">Kuliner</p>
                </div>
            </div>
            
            <!-- Sponsor 7 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="sponsor-card">
                    <div class="sponsor-logo">
                        <i class="fas fa-tshirt fa-4x" style="color: var(--accent-green);"></i>
                        </div>
                    <h5 class="sponsor-name">Outdoor Gear Indonesia</h5>
                    <p class="sponsor-type">Peralatan Outdoor</p>
                            </div>
                        </div>
            
            <!-- Sponsor 8 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="sponsor-card">
                    <div class="sponsor-logo">
                        <i class="fas fa-camera fa-4x" style="color: var(--accent-green);"></i>
                    </div>
                    <h5 class="sponsor-name">Canon Indonesia</h5>
                    <p class="sponsor-type">Fotografi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="cta-content text-center">
            <h2 class="cta-title">Siap Memulai Petualangan?</h2>
            <p class="cta-description">
                Bergabunglah dengan komunitas outdoor terbaik di Jawa Timur dan rasakan pengalaman tak terlupakan
            </p>
            <div class="cta-buttons mt-4">
                <a href="<?= base_url('event') ?>" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-calendar-alt me-2"></i>Lihat Events
                </a>
                <a href="<?= base_url('about') ?>" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>

<script>
// Hero Carousel Functionality
let slideIndex = 1;
let slideInterval;

// Initialize carousel
document.addEventListener('DOMContentLoaded', function() {
    // Wait a bit for images to load
    setTimeout(function() {
        showSlides(slideIndex);
        startAutoSlide();
    }, 500);
});

// Auto slide function
function startAutoSlide() {
    slideInterval = setInterval(function() {
        slideIndex++;
        if (slideIndex > 5) {
            slideIndex = 1;
        }
        showSlides(slideIndex);
    }, 5000); // Change slide every 5 seconds
}

// Stop auto slide when user interacts
function stopAutoSlide() {
    clearInterval(slideInterval);
}

// Restart auto slide after 10 seconds of inactivity
function restartAutoSlide() {
    stopAutoSlide();
    setTimeout(startAutoSlide, 10000);
}

// Show specific slide
function currentSlide(n) {
    slideIndex = n;
    showSlides(slideIndex);
    restartAutoSlide();
}

// Show slides function
function showSlides(n) {
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.dot');
    
    if (slides.length === 0) {
        console.log('No carousel slides found');
        return;
    }
    
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    
    // Hide all slides
    slides.forEach(slide => {
        slide.classList.remove('active');
    });
    
    // Remove active class from all dots
    dots.forEach(dot => {
        dot.classList.remove('active');
    });
    
    // Show current slide and activate corresponding dot
    if (slides[slideIndex - 1]) {
        slides[slideIndex - 1].classList.add('active');
    }
    if (dots[slideIndex - 1]) {
        dots[slideIndex - 1].classList.add('active');
    }
}

// Pause carousel on hover
const heroCarousel = document.querySelector('.hero-carousel');
if (heroCarousel) {
    heroCarousel.addEventListener('mouseenter', stopAutoSlide);
    heroCarousel.addEventListener('mouseleave', startAutoSlide);
}

// Touch/swipe support for mobile
let startX = 0;
let endX = 0;

document.querySelector('.hero-carousel').addEventListener('touchstart', function(e) {
    startX = e.touches[0].clientX;
    stopAutoSlide();
});

document.querySelector('.hero-carousel').addEventListener('touchend', function(e) {
    endX = e.changedTouches[0].clientX;
    handleSwipe();
    restartAutoSlide();
});

function handleSwipe() {
    const threshold = 50;
    const diff = startX - endX;
    
    if (Math.abs(diff) > threshold) {
        if (diff > 0) {
            // Swipe left - next slide
            slideIndex++;
            if (slideIndex > 5) slideIndex = 1;
        } else {
            // Swipe right - previous slide
            slideIndex--;
            if (slideIndex < 1) slideIndex = 5;
        }
        showSlides(slideIndex);
    }
}
</script>
