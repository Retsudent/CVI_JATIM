<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content text-center">
            <!-- Page Icon Above Title -->
            <div class="mb-3">
                <i class="fas fa-envelope fa-4x" style="color: var(--accent-green);"></i>
            </div>
            
            <!-- Page Title Below Icon -->
            <h1 class="hero-title">
                Kontak Kami
            </h1>
            <p class="hero-subtitle">
                Hubungi kami untuk informasi lebih lanjut tentang event, merchandise, dan campground
            </p>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">
                            <i class="fas fa-paper-plane me-2" style="color: var(--accent-green);"></i>
                            Kirim Pesan
                        </h4>
                        <form id="contactForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">No. Telepon</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <select class="form-select" id="subject" name="subject" required>
                                        <option value="">Pilih Subjek</option>
                                        <option value="event">Informasi Event</option>
                                        <option value="merchandise">Pemesanan Merchandise</option>
                                        <option value="campground">Reservasi Campground</option>
                                        <option value="membership">Keanggotaan</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title mb-4">
                            <i class="fas fa-info-circle me-2" style="color: var(--accent-green);"></i>
                            Informasi Kontak
                        </h4>
                        
                        <div class="mb-4">
                            <h6 class="text-success mb-2">
                                <i class="fas fa-envelope me-2"></i>Email
                            </h6>
                            <p class="mb-0">info@cviwirotaman.com</p>
                            <p class="mb-0">admin@cviwirotaman.com</p>
                        </div>
                        
                        <div class="mb-4">
                            <h6 class="text-success mb-2">
                                <i class="fas fa-phone me-2"></i>Telepon
                            </h6>
                            <p class="mb-0">+62 812-3456-7890</p>
                            <p class="mb-0">+62 813-4567-8901</p>
                        </div>
                        
                        <div class="mb-4">
                            <h6 class="text-success mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Alamat
                            </h6>
                            <p class="mb-0">Jl. Raya Bromo No. 123</p>
                            <p class="mb-0">Probolinggo, Jawa Timur 67215</p>
                        </div>
                        
                        <div class="mb-4">
                            <h6 class="text-success mb-2">
                                <i class="fas fa-clock me-2"></i>Jam Operasional
                            </h6>
                            <p class="mb-0">Senin - Jumat: 08:00 - 17:00</p>
                            <p class="mb-0">Sabtu: 08:00 - 15:00</p>
                            <p class="mb-0">Minggu: Tutup</p>
                        </div>
                        
                        <div class="mb-4">
                            <h6 class="text-success mb-2">
                                <i class="fas fa-share-alt me-2"></i>Sosial Media
                            </h6>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-outline-info btn-sm">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="btn btn-outline-success btn-sm">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="#" class="btn btn-outline-danger btn-sm">
                                    <i class="fab fa-youtube"></i>
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
<section class="py-5" style="background: linear-gradient(135deg, #f8fff8 0%, #e6ffe6 100%);">
    <div class="container">
        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <p>Pertanyaan yang sering diajukan tentang CVI Wirotaman</p>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Bagaimana cara bergabung dengan CVI Wirotaman?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Untuk bergabung dengan CVI Wirotaman, Anda dapat menghubungi kami melalui form kontak di atas atau datang langsung ke basecamp kami. Kami akan memberikan informasi lengkap tentang proses pendaftaran dan persyaratan yang diperlukan.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Apakah ada biaya keanggotaan?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, ada biaya keanggotaan tahunan sebesar Rp 100.000 yang digunakan untuk operasional komunitas, asuransi kegiatan, dan pengembangan program. Biaya ini sangat terjangkau dan memberikan banyak manfaat untuk anggota.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Bagaimana cara memesan merchandise?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Anda dapat memesan merchandise melalui form kontak di atas dengan memilih subjek "Pemesanan Merchandise". Kami akan menghubungi Anda untuk konfirmasi pesanan dan informasi pengiriman.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Apakah ada persyaratan khusus untuk mengikuti event?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Setiap event memiliki persyaratan yang berbeda-beda. Umumnya, peserta harus dalam kondisi fisik yang sehat, membawa peralatan yang diperlukan, dan mengikuti aturan keselamatan yang telah ditetapkan. Informasi detail akan diberikan saat pendaftaran event.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%); color: white;">
    <div class="container text-center">
        <h2 class="mb-4" style="color:#ffffff; text-shadow: 0 2px 6px rgba(0,0,0,0.35); font-weight:800;">Siap Bergabung dengan Kami?</h2>
        <p class="lead mb-4" style="color:#f7f7f7; text-shadow: 0 1px 4px rgba(0,0,0,0.35); font-weight:600;">
            Jangan ragu untuk menghubungi kami. Tim CVI Wirotaman siap membantu dan menjawab semua pertanyaan Anda.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="#contactForm" class="btn btn-light btn-lg">
                <i class="fas fa-envelope me-2"></i>Kirim Pesan
            </a>
            <a href="<?= base_url('about') ?>" class="btn btn-outline-light btn-lg">
                <i class="fas fa-info-circle me-2"></i>Tentang Kami
            </a>
        </div>
    </div>
</section>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
    submitBtn.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Show success message
        alert('Pesan berhasil dikirim! Kami akan menghubungi Anda segera.');
        
        // Reset form
        this.reset();
    }, 2000);
});
</script>