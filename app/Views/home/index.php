<style>
	:root{--accent-green:#2e7d32;--accent-light:#66bb6a;--text-dark:#1b4332}
	.hero-section{position:relative;min-height:72vh;color:#fff;display:flex;align-items:center}
	.hero-carousel{position:absolute;inset:0;overflow:hidden}
	.carousel-slide{position:absolute;inset:0;background-size:cover;background-position:center;opacity:0;transition:opacity .8s ease}
	.carousel-slide.active{opacity:1}
	.carousel-overlay{position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.45),rgba(0,0,0,.25))}
	.floating-particles{position:absolute;inset:0;pointer-events:none}
	.floating-particles .particle{position:absolute;width:10px;height:10px;border-radius:50%;background:rgba(255,255,255,.15);animation:float 8s infinite ease-in-out}
	.floating-particles .particle:nth-child(1){top:20%;left:10%;animation-delay:0s}
	.floating-particles .particle:nth-child(2){top:60%;left:70%;animation-delay:1.2s}
	.floating-particles .particle:nth-child(3){top:40%;left:30%;animation-delay:.6s}
	.floating-particles .particle:nth-child(4){top:75%;left:15%;animation-delay:1.8s}
	.floating-particles .particle:nth-child(5){top:30%;left:85%;animation-delay:.3s}
	@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-14px)}}
	.carousel-dots{position:absolute;bottom:16px;left:50%;transform:translateX(-50%);display:flex;gap:8px;z-index:2}
	.carousel-dots .dot{width:10px;height:10px;border-radius:50%;background:rgba(255,255,255,.5);cursor:pointer;transition:all .2s}
	.carousel-dots .dot.active,.carousel-dots .dot:hover{background:#fff;transform:scale(1.1)}
	.hero-title{font-weight:800;letter-spacing:.05em;text-shadow:0 6px 20px rgba(0,0,0,.35)}
	.hero-subtitle{opacity:.95}
	.stat-card{background:#fff;border-radius:16px;padding:18px;box-shadow:0 8px 20px rgba(0,0,0,.08);transition:transform .2s,box-shadow .2s}
	.stat-card:hover{transform:translateY(-4px);box-shadow:0 12px 26px rgba(0,0,0,.12)}
	.badge-circle{display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--accent-green),var(--accent-light));color:#fff}
	.feature-item{display:flex;align-items:center;gap:10px;background:#f7fff7;border:1px solid #e0f2e9;padding:10px 12px;border-radius:12px}
	.card-frame{background:#fff;border-radius:16px;box-shadow:0 10px 24px rgba(0,0,0,.1);padding:10px}
	.parallax-lite{object-fit:cover;transform:scale(1.02);transition:transform .8s ease}
	.card-frame:hover .parallax-lite{transform:scale(1.06)}
	.testimonial-card{background:#fff;border-radius:16px;box-shadow:0 8px 22px rgba(0,0,0,.08);padding:22px;height:100%}
	.cta-section{background:linear-gradient(135deg,#e8f5e9,#c8e6c9)}
	.cta-title{font-weight:800;color:var(--text-dark)}

	/* Responsive Typography */
	@media (max-width: 992px){.hero-section{min-height:64vh}.hero-title{font-size:40px}}
	@media (max-width: 768px){.hero-title{font-size:32px}.hero-subtitle{font-size:16px}.stat-card{padding:16px}}
	@media (max-width: 576px){.hero-section{min-height:58vh}.hero-title{font-size:28px}.btn{width:100%}}
</style>
<!-- Hero Section with Background Carousel -->
<section class="hero-section hero-carousel-section">
           <!-- Background Image Carousel -->
           <div class="hero-carousel">
               <div class="carousel-slide active" style="background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
                   <div class="carousel-overlay"></div>
               </div>
               <div class="carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80');">
                   <div class="carousel-overlay"></div>
               </div>
               <div class="carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2074&q=80');">
                   <div class="carousel-overlay"></div>
               </div>
               <div class="carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1448375240586-882707db888b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
                   <div class="carousel-overlay"></div>
               </div>
               <div class="carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
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
                        <h3 class="stat-number">5</h3>
                        <p class="stat-label">Kabupaten</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card text-center">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-campground fa-2x" style="color: var(--accent-green);"></i>
                        </div>
                        <h3 class="stat-number">15+</h3>
                        <p class="stat-label">Campground</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card text-center">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-calendar-alt fa-2x" style="color: var(--accent-green);"></i>
                        </div>
                        <h3 class="stat-number">50+</h3>
                        <p class="stat-label">Events</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card text-center">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-users fa-2x" style="color: var(--accent-green);"></i>
                        </div>
                        <h3 class="stat-number">1000+</h3>
                        <p class="stat-label">Members</p>
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
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                 alt="Mountain Adventure" class="w-100 h-100 object-cover parallax-lite">
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
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-success">Upcoming</span>
                            <small class="text-muted">10-11 May 2025</small>
                        </div>
                        <h5 class="card-title">Anniversary CVI Wirotaman 2nd</h5>
                        <p class="card-text">
                            Perayaan ulang tahun ke-2 CVI Wirotaman di Wonder Park Tawangmangu dengan berbagai kegiatan seru.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt me-1"></i>Wonder Park - Tawangmangu
                            </small>
                            <a href="<?= base_url('event') ?>" class="btn btn-outline-primary btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-success">Upcoming</span>
                            <small class="text-muted">22-23 Feb 2025</small>
                        </div>
                        <h5 class="card-title">Camping Menyambut Ramadhan</h5>
                        <p class="card-text">
                            Camping khusus menyambut bulan suci Ramadhan di Danau Telaga Ngebel, Ponorogo.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt me-1"></i>Danau Telaga Ngebel
                            </small>
                            <a href="<?= base_url('event') ?>" class="btn btn-outline-primary btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-secondary">Completed</span>
                            <small class="text-muted">02-03 Mar 2024</small>
                        </div>
                        <h5 class="card-title">Happy Camp KOPDAR CVI JATIM</h5>
                        <p class="card-text">
                            Kopdar dan camping bersama komunitas CVI Jawa Timur di Bumi Perkemahan Karanganyar.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt me-1"></i>Bumi Perkemahan Karanganyar
                            </small>
                            <a href="<?= base_url('event') ?>" class="btn btn-outline-secondary btn-sm" disabled>Event Selesai</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?= base_url('event') ?>" class="btn btn-primary btn-lg">
                <i class="fas fa-calendar-alt me-2"></i>Lihat Semua Events
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>Apa Kata Mereka?</h2>
            <p>Testimoni dari para member yang telah merasakan pengalaman luar biasa bersama CVI Wirotaman</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars mb-3">
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                        </div>
                        <p class="testimonial-text">
                            "Pengalaman hiking yang luar biasa! Panduan yang profesional dan pemandangan yang menakjubkan. 
                            Pasti akan ikut lagi!"
                        </p>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h6 class="author-name">Ahmad Rizki</h6>
                                <p class="author-title">Member Sejak 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars mb-3">
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                        </div>
                        <p class="testimonial-text">
                            "Fasilitas camping yang sangat lengkap dan nyaman. Tim CVI Wirotaman sangat membantu 
                            dan ramah. Recommended banget!"
                        </p>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h6 class="author-name">Siti Nurhaliza</h6>
                                <p class="author-title">Member Sejak 2022</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars mb-3">
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                        </div>
                        <p class="testimonial-text">
                            "Event-event yang diadakan selalu seru dan bermanfaat. Bisa belajar banyak tentang 
                            alam dan survival skills."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h6 class="author-name">Budi Santoso</h6>
                                <p class="author-title">Member Sejak 2021</p>
                            </div>
                        </div>
                    </div>
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
    showSlides(slideIndex);
    startAutoSlide();
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
document.querySelector('.hero-carousel').addEventListener('mouseenter', stopAutoSlide);
document.querySelector('.hero-carousel').addEventListener('mouseleave', startAutoSlide);

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
