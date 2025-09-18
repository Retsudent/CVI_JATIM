<?php
// Contact page content
?>
<!-- Page Header -->
<section class="hero-section" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Kontak Kami</h1>
            <p class="hero-subtitle">Hubungi kami untuk informasi lebih lanjut tentang event, merchandise, dan campground</p>
            <div class="hero-locations">
                <span class="location-badge">Ngawi</span>
                <span class="location-badge">Ponorogo</span>
                <span class="location-badge">Pacitan</span>
                <span class="location-badge">Madiun</span>
                <span class="location-badge">Magetan</span>
            </div>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>Hubungi Kami</h2>
            <p>Kami siap membantu Anda dengan pertanyaan atau kebutuhan terkait CVI Wirotaman</p>
        </div>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h3 class="card-title mb-2">
                                <i class="fas fa-envelope text-primary me-2"></i>Kirim Pesan
                            </h3>
                            <p class="text-muted">Isi form di bawah ini dan kami akan segera merespons</p>
                        </div>
                        
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label fw-semibold">
                                        <i class="fas fa-user me-1"></i>Nama Lengkap
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="name" placeholder="Masukkan nama lengkap" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label fw-semibold">
                                        <i class="fas fa-envelope me-1"></i>Email
                                    </label>
                                    <input type="email" class="form-control form-control-lg" id="email" placeholder="contoh@email.com" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label fw-semibold">
                                        <i class="fas fa-phone me-1"></i>No. Telepon
                                    </label>
                                    <input type="tel" class="form-control form-control-lg" id="phone" placeholder="08xxxxxxxxxx">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subject" class="form-label fw-semibold">
                                        <i class="fas fa-tag me-1"></i>Subjek
                                    </label>
                                    <select class="form-select form-select-lg" id="subject" required>
                                        <option value="">Pilih Subjek</option>
                                        <option value="event">📅 Informasi Event</option>
                                        <option value="merchandise">🛍️ Pemesanan Merchandise</option>
                                        <option value="campground">🏕️ Booking Campground</option>
                                        <option value="partnership">🤝 Kerjasama</option>
                                        <option value="membership">👥 Keanggotaan</option>
                                        <option value="other">❓ Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="form-label fw-semibold">
                                    <i class="fas fa-comment me-1"></i>Pesan
                                </label>
                                <textarea class="form-control form-control-lg" id="message" rows="5" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Contact Info Cards -->
                <div class="contact-info-wrapper">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-map-marker-alt text-primary fs-2"></i>
                            </div>
                            <h5 class="card-title fw-bold">Alamat</h5>
                            <p class="card-text">
                                Jawa Timur, Indonesia<br>
                                <small class="text-muted">Wilayah: Ngawi, Ponorogo, Pacitan, Madiun, Magetan</small>
                            </p>
                        </div>
                    </div>
                    
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-phone text-primary fs-2"></i>
                            </div>
                            <h5 class="card-title fw-bold">Telepon</h5>
                            <p class="card-text">
                                <a href="tel:+6281234567890" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-phone me-1"></i>+62 812 3456 7890
                                </a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-envelope text-primary fs-2"></i>
                            </div>
                            <h5 class="card-title fw-bold">Email</h5>
                            <p class="card-text">
                                <a href="mailto:info@cviwirotaman.web.id" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-envelope me-1"></i>info@cviwirotaman.web.id
                                </a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-clock text-primary fs-2"></i>
                            </div>
                            <h5 class="card-title fw-bold">Jam Operasional</h5>
                            <p class="card-text">
                                <strong>Senin - Jumat:</strong><br>08:00 - 17:00<br>
                                <strong>Sabtu:</strong><br>08:00 - 15:00<br>
                                <strong>Minggu:</strong><br>Tutup
                            </p>
                        </div>
                    </div>
                    
                    <!-- Quick Contact -->
                    <div class="card shadow-sm">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title mb-3 fw-bold">
                                <i class="fas fa-bolt text-warning me-2"></i>Kontak Cepat
                            </h5>
                            <p class="card-text mb-3">Butuh bantuan cepat? Hubungi kami langsung!</p>
                            <div class="d-grid gap-2">
                                <a href="https://wa.me/6281234567890" class="btn btn-success" target="_blank">
                                    <i class="fab fa-whatsapp me-2"></i>WhatsApp
                                </a>
                                <a href="tel:+6281234567890" class="btn btn-primary">
                                    <i class="fas fa-phone me-2"></i>Telepon
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>Pertanyaan yang Sering Diajukan</h2>
            <p>Berikut adalah jawaban untuk pertanyaan yang sering ditanyakan</p>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                <i class="fas fa-question-circle text-primary me-2"></i>
                                Bagaimana cara bergabung dengan CVI Wirotaman?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Untuk bergabung dengan CVI Wirotaman, Anda bisa menghubungi kami melalui WhatsApp, email, atau mengisi form kontak di halaman ini. Kami akan memberikan informasi lengkap tentang keanggotaan dan kegiatan yang tersedia.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                <i class="fas fa-calendar text-primary me-2"></i>
                                Kapan event CVI Wirotaman diadakan?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Event CVI Wirotaman diadakan secara berkala sepanjang tahun. Informasi event terbaru dapat dilihat di halaman Event atau mengikuti media sosial kami untuk update terbaru.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                <i class="fas fa-shopping-cart text-primary me-2"></i>
                                Bagaimana cara memesan merchandise?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Anda bisa memesan merchandise dengan menghubungi kami melalui WhatsApp atau mengisi form kontak dengan subjek "Pemesanan Merchandise". Kami akan memberikan informasi harga, ukuran, dan cara pembayaran.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                Di mana saja area operasional CVI Wirotaman?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                CVI Wirotaman beroperasi di wilayah Jawa Timur, khususnya area Karesidenan Madiun dan sekitarnya, meliputi Ngawi, Ponorogo, Pacitan, Madiun, dan Magetan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Media -->
<section class="py-5">
    <div class="container">
        <div class="section-title mb-5">
            <h2>Ikuti Kami di Media Sosial</h2>
            <p>Dapatkan update terbaru tentang event, merchandise, dan kegiatan CVI Wirotaman</p>
        </div>
        
        <div class="row">
            <div class="col-12 text-center">
                <div class="social-links">
                    <a href="#" class="btn btn-outline-primary me-3 mb-3 btn-lg">
                        <i class="fab fa-facebook-f me-2"></i>Facebook
                    </a>
                    <a href="#" class="btn btn-outline-primary me-3 mb-3 btn-lg">
                        <i class="fab fa-instagram me-2"></i>Instagram
                    </a>
                    <a href="https://wa.me/6281234567890" class="btn btn-outline-success me-3 mb-3 btn-lg" target="_blank">
                        <i class="fab fa-whatsapp me-2"></i>WhatsApp
                    </a>
                    <a href="#" class="btn btn-outline-danger mb-3 btn-lg">
                        <i class="fab fa-youtube me-2"></i>YouTube
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom styles for contact page */
    .hero-locations {
        margin-top: 1rem;
    }
    
    .location-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 0.5rem 1rem;
        margin: 0.25rem;
        border-radius: 25px;
        font-size: 0.9rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    
    .section-title h2 {
        color: #2c3e50;
        margin-bottom: 1rem;
    }
    
    .section-title p {
        color: #6c757d;
        font-size: 1.1rem;
    }
    
    .contact-info-wrapper {
        position: sticky;
        top: 2rem;
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(13, 110, 253, 0.1);
        border-radius: 50%;
    }
    
    .form-control-lg, .form-select-lg {
        border-radius: 0.5rem;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }
    
    .form-control-lg:focus, .form-select-lg:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }
    
    .form-label {
        color: #495057;
        margin-bottom: 0.5rem;
    }
    
    .accordion-button {
        font-weight: 600;
        color: #2c3e50;
    }
    
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #0d6efd;
    }
    
    .social-links .btn {
        border-radius: 25px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .social-links .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    
    .card {
        border: none;
        border-radius: 1rem;
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-2px);
    }
    
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0,0,0,0.175) !important;
    }
    
    .shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075) !important;
    }
</style>

<script>
    // Form submission with better UX
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
        submitBtn.disabled = true;
        
        // Simulate form submission
        setTimeout(() => {
            // Show success message
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success alert-dismissible fade show mt-3';
            alertDiv.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>
                <strong>Terima kasih!</strong> Pesan Anda telah dikirim. Kami akan segera menghubungi Anda.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            this.appendChild(alertDiv);
            
            // Reset form
            this.reset();
            
            // Reset button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            
            // Auto dismiss alert after 5 seconds
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 5000);
            
        }, 2000);
    });
    
    // Add form validation feedback
    const inputs = document.querySelectorAll('#contactForm input, #contactForm select, #contactForm textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.checkValidity()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            }
        });
    });
    
    // Phone number formatting
    document.getElementById('phone').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0) {
            if (value.startsWith('0')) {
                value = value.substring(1);
            }
            if (value.length > 0) {
                value = '0' + value;
            }
        }
        e.target.value = value;
    });
</script>
<?php
// End of contact page
?>

