<?php
// Contact page content
?>
<!-- Page Header -->
<section class="hero-section" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Kontak Kami</h1>
            <p class="hero-subtitle">Hubungi kami untuk informasi lebih lanjut</p>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-4">
                        <h3 class="card-title mb-4">Kirim Pesan</h3>
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">No. Telepon</label>
                                    <input type="tel" class="form-control" id="phone">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <select class="form-select" id="subject" required>
                                        <option value="">Pilih Subjek</option>
                                        <option value="event">Informasi Event</option>
                                        <option value="merchandise">Pemesanan Merchandise</option>
                                        <option value="campground">Booking Campground</option>
                                        <option value="partnership">Kerjasama</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Alamat
                        </h5>
                        <p class="card-text">
                            Jawa Timur, Indonesia<br>
                            Wilayah: Ngawi, Ponorogo, Pacitan, Madiun, Magetan
                        </p>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-phone text-primary me-2"></i>Telepon
                        </h5>
                        <p class="card-text">
                            <a href="tel:+6281234567890" class="text-decoration-none">+62 812 3456 7890</a>
                        </p>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-envelope text-primary me-2"></i>Email
                        </h5>
                        <p class="card-text">
                            <a href="mailto:info@cviwirotaman.web.id" class="text-decoration-none">info@cviwirotaman.web.id</a>
                        </p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-clock text-primary me-2"></i>Jam Operasional
                        </h5>
                        <p class="card-text">
                            <strong>Senin - Jumat:</strong> 08:00 - 17:00<br>
                            <strong>Sabtu:</strong> 08:00 - 15:00<br>
                            <strong>Minggu:</strong> Tutup
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Media -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="mb-4">Ikuti Kami di Media Sosial</h3>
                <div class="social-links">
                    <a href="#" class="btn btn-outline-primary me-3 mb-2">
                        <i class="fab fa-facebook-f me-2"></i>Facebook
                    </a>
                    <a href="#" class="btn btn-outline-primary me-3 mb-2">
                        <i class="fab fa-instagram me-2"></i>Instagram
                    </a>
                    <a href="#" class="btn btn-outline-primary me-3 mb-2">
                        <i class="fab fa-whatsapp me-2"></i>WhatsApp
                    </a>
                    <a href="#" class="btn btn-outline-primary mb-2">
                        <i class="fab fa-youtube me-2"></i>YouTube
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Form submission
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Terima kasih! Pesan Anda telah dikirim. Kami akan segera menghubungi Anda.');
        this.reset();
    });
</script>
<?php
// End of contact page
?>

