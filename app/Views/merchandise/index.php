<!-- Page Header -->
<section class="hero-section" data-animate="zoom-in">
    <div class="container">
        <div class="hero-content text-center">
            <!-- Page Icon Above Title -->
            <div class="mb-3">
                <i class="fas fa-shopping-bag fa-4x" style="color: var(--accent-green);"></i>
            </div>
            
            <!-- Page Title Below Icon -->
            <h1 class="hero-title">
                Merchandise
            </h1>
            <p class="hero-subtitle">
                Dapatkan merchandise eksklusif dari CVI Wirotaman
            </p>
        </div>
    </div>
</section>

<!-- Merchandise Content -->
<section class="py-5" data-animate="fade-up">
    <div class="container">
        <!-- Filter Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Filter Merchandise</h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <select class="form-select" id="categoryFilter">
                                    <option value="">Semua Kategori</option>
                                    <option value="tumbler">Tumbler</option>
                                    <option value="kaos">Kaos</option>
                                    <option value="set">Set</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" id="priceFilter">
                                    <option value="">Semua Harga</option>
                                    <option value="low">< 50k</option>
                                    <option value="medium">50k - 100k</option>
                                    <option value="high">> 100k</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary w-100" onclick="filterMerchandise()">
                                    <i class="fas fa-filter me-2"></i>Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Merchandise Grid -->
        <div class="row g-4" id="merchandiseGrid">
            <!-- Product 1 - Tumbler Putih -->
            <div class="col-lg-4 col-md-6" data-category="tumbler" data-price="low">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <div class="position-relative">
                            <div class="product-placeholder" style="height: 250px; background: linear-gradient(135deg, var(--light-green), var(--pale-green)); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-coffee fa-4x" style="color: var(--accent-green);"></i>
                            </div>
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-success">Tersedia</span>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="card-title">Tumbler Putih Event Anniversary CVI WIROTAMAN 2nd</h6>
                            <p class="card-text small text-muted">
                                Tumbler putih dengan desain eksklusif Anniversary CVI Wirotaman 2nd. 
                                Bahan stainless steel berkualitas tinggi.
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold">Rp 45.000</span>
                                <div>
                                    <a href="<?= base_url('merchandise/tumbler-putih') ?>" class="btn btn-primary btn-sm">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product 2 - Kaos Event -->
            <div class="col-lg-4 col-md-6" data-category="kaos" data-price="medium">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <div class="position-relative">
                            <div class="product-placeholder" style="height: 250px; background: linear-gradient(135deg, var(--pale-green), var(--mint-green)); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-tshirt fa-4x" style="color: var(--accent-green);"></i>
                            </div>
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-success">Tersedia</span>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="card-title">Kaos Event Anniversary CVI WIROTAMAN 2nd</h6>
                            <p class="card-text small text-muted">
                                Kaos dengan desain eksklusif Anniversary CVI Wirotaman 2nd. 
                                Bahan katun 100% yang nyaman dipakai.
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold">Rp 100.000</span>
                                <div>
                                    <a href="<?= base_url('merchandise/kaos-anniversary') ?>" class="btn btn-primary btn-sm">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product 3 - Tumbler Set Vacuum Flask -->
            <div class="col-lg-4 col-md-6" data-category="set" data-price="medium">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <div class="position-relative">
                            <div class="product-placeholder" style="height: 250px; background: linear-gradient(135deg, var(--mint-green), var(--light-green)); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-gift fa-4x" style="color: var(--accent-green);"></i>
                            </div>
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-warning">Terbatas</span>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="card-title">Tumbler Set Vacuum Flask Event Anniversary CVI WIROTAMAN 2nd</h6>
                            <p class="card-text small text-muted">
                                Set tumbler vacuum flask dengan desain eksklusif Anniversary CVI Wirotaman 2nd. 
                                Paket lengkap untuk kebutuhan outdoor.
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold">Rp 60.000</span>
                                <div>
                                    <a href="<?= base_url('merchandise/tumbler-set') ?>" class="btn btn-primary btn-sm">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product 4 - Tumbler Hitam -->
            <div class="col-lg-4 col-md-6" data-category="tumbler" data-price="low">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <div class="position-relative">
                            <div class="product-placeholder" style="height: 250px; background: linear-gradient(135deg, var(--light-green), var(--pale-green)); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-coffee fa-4x" style="color: var(--accent-green);"></i>
                            </div>
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-success">Tersedia</span>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="card-title">Tumbler Hitam Event Anniversary CVI WIROTAMAN 2nd</h6>
                            <p class="card-text small text-muted">
                                Tumbler hitam dengan desain eksklusif Anniversary CVI Wirotaman 2nd. 
                                Bahan stainless steel berkualitas tinggi.
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold">Rp 45.000</span>
                                <div>
                                    <a href="<?= base_url('merchandise/tumbler-hitam') ?>" class="btn btn-primary btn-sm">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-5">
            <button class="btn btn-primary btn-lg px-4 py-3" onclick="loadMoreProducts()">
                <i class="fas fa-plus me-2"></i>Load More Products
            </button>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%); color: white;">
    <div class="container text-center">
        <h2 class="mb-4" style="color:#ffffff; text-shadow: 0 2px 6px rgba(0,0,0,0.35); font-weight:800;">Ingin Memesan Merchandise?</h2>
        <p class="lead mb-4" style="color:#f7f7f7; text-shadow: 0 1px 4px rgba(0,0,0,0.35); font-weight:600;">
            Hubungi kami untuk informasi pemesanan dan pengiriman merchandise CVI Wirotaman.
        </p>
        <a href="<?= base_url('contact') ?>" class="btn btn-light btn-lg px-4 py-3">
            <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
        </a>
    </div>
</section>

<script>
function filterMerchandise() {
    const categoryFilter = document.getElementById('categoryFilter').value;
    const priceFilter = document.getElementById('priceFilter').value;
    const products = document.querySelectorAll('#merchandiseGrid .col-lg-4');
    
    products.forEach(product => {
        const category = product.getAttribute('data-category');
        const price = product.getAttribute('data-price');
        
        let showProduct = true;
        
        if (categoryFilter && category !== categoryFilter) {
            showProduct = false;
        }
        
        if (priceFilter && price !== priceFilter) {
            showProduct = false;
        }
        
        product.style.display = showProduct ? 'block' : 'none';
    });
}

function loadMoreProducts() {
    const loadingBtn = document.querySelector('.btn-lg');
    const originalText = loadingBtn.innerHTML;
    
    loadingBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
    loadingBtn.disabled = true;
    
    setTimeout(() => {
        loadingBtn.innerHTML = originalText;
        loadingBtn.disabled = false;
        alert('Semua produk telah ditampilkan!');
    }, 2000);
}
</script>