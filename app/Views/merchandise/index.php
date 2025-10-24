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
                                    <option value="accessories">Aksesoris</option>
                                    <option value="apparel">Kaos</option>
                                    <option value="souvenir">Souvenir</option>
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
<?php if (!empty($products)): ?>
<?php foreach ($products as $p): ?>
            <?php 
            // Normalize potentially multiple categories (comma separated)
            $rawCat = strtolower(trim((string)($p['category'] ?? '')));
            $parts = array_filter(array_map('trim', preg_split('/[,|]/', $rawCat)));
            $normParts = [];
            foreach ($parts as $c) {
                if ($c === '') { continue; }
                if (strpos($c, 'souvenir') !== false) { $normParts['souvenir'] = 'souvenir'; continue; }
                if (strpos($c, 'aksesori') !== false || strpos($c, 'accessor') !== false || strpos($c, 'aksesoris') !== false) { $normParts['accessories'] = 'accessories'; continue; }
                if (strpos($c, 'kaos') !== false || strpos($c, 'apparel') !== false || strpos($c, 't-shirt') !== false) { $normParts['apparel'] = 'apparel'; continue; }
                $normParts[$c] = $c;
            }
            if (empty($normParts) && $rawCat !== '') { $normParts[$rawCat] = $rawCat; }
            $normCat = implode(' ', array_values($normParts)); // space-separated tokens
            // Price bucket for filtering
            $priceVal = (float)($p['price'] ?? 0);
            $priceBucket = $priceVal < 50000 ? 'low' : ($priceVal <= 100000 ? 'medium' : 'high');
            ?>
            <div class="col-lg-4 col-md-6" data-id="<?= (int)$p['id'] ?>" data-categories="<?= htmlspecialchars($normCat) ?>" data-price="<?= $priceBucket ?>">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <div class="position-relative">
                            <?php
                                // Resolve image URL: accept full URLs, asset paths, or simple filenames
                                $imgUrl = null;
                                if (!empty($p['image'])) {
                                    $raw = trim((string)$p['image']);
                                    if (preg_match('#^(https?:)?//#i', $raw)) {
                                        $imgUrl = $raw;
                                    } elseif (strpos($raw, 'assets/') !== false || strpos($raw, '/assets/') !== false) {
                                        $imgUrl = base_url($raw);
                                    } else {
                                        // Assume filename stored, build path under merchandise folder
                                        $imgUrl = base_url('assets/images/merchandise/' . $raw);
                                    }
                                }
                            ?>
                            <?php if ($imgUrl): ?>
                                <div class="product-image" style="height:250px; display:flex; align-items:center; justify-content:center; overflow:hidden; background:#f6fff6;">
                                    <img src="<?= esc($imgUrl) ?>" alt="<?= htmlspecialchars($p['name'] ?? 'Product') ?>" style="width:100%; height:100%; object-fit:cover; display:block;" onerror="this.style.display='none'" />
                                    <div class="product-fallback-icon" style="position:absolute; inset:0; display:flex; align-items:center; justify-content:center; pointer-events:none;">
                                        <i class="fas fa-gift fa-4x" style="color: rgba(34,90,24,0.15);"></i>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="product-placeholder" style="height: 250px; background: linear-gradient(135deg, var(--light-green), var(--pale-green)); display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-gift fa-4x" style="color: var(--accent-green);"></i>
                                </div>
                            <?php endif; ?>
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge <?= ($p['status']==='available'?'bg-success':($p['status']==='out_of_stock'?'bg-danger':'bg-secondary')) ?>"><?= ucfirst($p['status']) ?></span>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="card-title"><?= htmlspecialchars($p['name']) ?></h6>
                            <p class="card-text small text-muted">
                                <?= htmlspecialchars(substr($p['description'] ?? '', 0, 100)) ?><?= strlen($p['description'] ?? '')>100?'...':'' ?>
                            </p>
                            <div class="mb-2">
                                <span class="badge bg-light text-dark">Kategori: <?= htmlspecialchars($p['category']) ?></span>
                            </div>
                            <div class="mb-2">
                                <?php
                                    $rating = isset($p['rating']) ? (float)$p['rating'] : (isset($p['avg_rating']) ? (float)$p['avg_rating'] : null);
                                    $displayRating = $rating !== null ? number_format($rating, 1) : null;
                                ?>
                                <div class="text-warning" style="display:inline-block;">
                                    <?php
                                        $r = $rating ?? 0;
                                        $full = (int) floor($r);
                                        $hasHalf = ($r - $full) >= 0.5;
                                        for ($i = 1; $i <= 5; $i++):
                                            if ($i <= $full): ?>
                                                <i class="fas fa-star"></i>
                                            <?php elseif ($hasHalf && $i == $full + 1): ?>
                                                <i class="fas fa-star-half-alt"></i>
                                            <?php else: ?>
                                                <i class="far fa-star"></i>
                                            <?php endif;
                                        endfor;
                                    ?>
                                </div>
                                <?php if ($displayRating !== null): ?>
                                    <small class="ms-2 text-muted"><?= $displayRating ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold">Rp <?= number_format((float)$p['price'], 0, ',', '.') ?></span>
                                <div>
                                    <a href="<?= base_url('merchandise/detail/' . (int)$p['id']) ?>" class="btn btn-primary btn-sm">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
<?php else: ?>
            <div class="col-12 text-center text-muted">Belum ada merchandise.</div>
<?php endif; ?>
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
// Read URL param once at global scope so it can be reused
const __params = new URLSearchParams(window.location.search);
const categoryParam = (__params.get('category') || '').toLowerCase();

function filterMerchandise() {
    const categoryFilter = (document.getElementById('categoryFilter').value || categoryParam).toLowerCase();
    const priceFilter = (document.getElementById('priceFilter').value || '').toLowerCase();
    const products = document.querySelectorAll('#merchandiseGrid .col-lg-4');
    
    products.forEach(product => {
        // categories can be space-separated tokens when product has multiple categories
        const categoriesStr = (product.getAttribute('data-categories') || product.getAttribute('data-category') || '').toLowerCase();
        const categoryTokens = categoriesStr.split(/\s+/).filter(Boolean);
        const price = (product.getAttribute('data-price') || '').toLowerCase();
        
        let showProduct = true;
        
        if (categoryFilter && !categoryTokens.includes(categoryFilter)) {
            showProduct = false;
        }
        
        if (priceFilter && price !== priceFilter) {
            showProduct = false;
        }
        
        product.style.display = showProduct ? 'block' : 'none';
    });
}

// Sync dropdown and auto-apply on load
document.addEventListener('DOMContentLoaded', function() {
    if (categoryParam) {
        const select = document.getElementById('categoryFilter');
        if (select) select.value = categoryParam;
        filterMerchandise();
    }
});

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

<script>
// Normal anchor navigation is used for product detail links.
</script>