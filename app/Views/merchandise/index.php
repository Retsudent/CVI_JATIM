<?php
// Merchandise index page content
?>
<!-- Page Header -->
<section class="hero-section" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Merchandise</h1>
            <p class="hero-subtitle">Dapatkan merchandise eksklusif dari CVI Wirotaman</p>
        </div>
    </div>
</section>

<!-- Merchandise List -->
<section class="py-5">
    <div class="container">
        <!-- Filter Section -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari merchandise..." id="searchInput">
                    <button class="btn btn-outline-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <select class="form-select" id="categoryFilter">
                    <option value="">Semua Kategori</option>
                    <option value="Apparel">Apparel</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Equipment">Equipment</option>
                </select>
            </div>
        </div>
        
        <div class="row" id="merchandiseGrid">
            <?php if (!empty($merchandise)): ?>
                <?php foreach ($merchandise as $item): ?>
                    <div class="col-lg-3 col-md-6 mb-4 merchandise-item" data-category="<?= esc($item['category']) ?>">
                        <div class="card">
                            <div class="position-relative">
                                <img src="<?= base_url('assets/images/merchandise/' . $item['image']) ?>" 
                                     class="card-img-top" 
                                     alt="<?= esc($item['name']) ?>"
                                     onerror="this.src='<?= base_url('assets/images/placeholder.svg') ?>'">
                                <?php if ($item['status'] === 'out_of_stock'): ?>
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-danger">Habis</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($item['name']) ?></h5>
                                <p class="card-text"><?= esc(substr($item['description'], 0, 100)) ?>...</p>
                                
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="price-tag">Rp <?= number_format($item['price'], 0, ',', '.') ?></div>
                                    <small class="text-muted">
                                        <i class="fas fa-box me-1"></i>Stok: <?= $item['stock'] ?>
                                    </small>
                                </div>
                                
                                <div class="d-flex gap-2">
                                    <a href="<?= base_url('merchandise/detail/' . $item['id']) ?>" class="btn btn-primary flex-fill">Lihat Detail</a>
                                    <?php if ($item['status'] === 'available' && $item['stock'] > 0): ?>
                                        <button class="btn btn-outline-primary" onclick="addToCart(<?= $item['id'] ?>)">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <div class="py-5">
                        <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Belum Ada Merchandise</h4>
                        <p class="text-muted">Merchandise akan segera hadir. Pantau terus website kami!</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
// End of merchandise index page
?>

<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const items = document.querySelectorAll('.merchandise-item');
        
        items.forEach(item => {
            const title = item.querySelector('.card-title').textContent.toLowerCase();
            const description = item.querySelector('.card-text').textContent.toLowerCase();
            
            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
    
    // Category filter
    document.getElementById('categoryFilter').addEventListener('change', function() {
        const selectedCategory = this.value;
        const items = document.querySelectorAll('.merchandise-item');
        
        items.forEach(item => {
            const category = item.getAttribute('data-category');
            
            if (selectedCategory === '' || category === selectedCategory) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
    
    // Add to cart function
    function addToCart(itemId) {
        // This would typically make an AJAX call to add item to cart
        alert('Fitur keranjang akan segera tersedia!');
    }
</script>
