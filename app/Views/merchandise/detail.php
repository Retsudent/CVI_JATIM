<?php
// Merchandise detail page content
?>
<!-- Merchandise Detail -->
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('merchandise') ?>" class="text-decoration-none">Merchandise</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= esc($merchandise['name']) ?></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;">
                    <div class="position-relative">
                        <img src="<?= base_url('assets/images/merchandise/' . $merchandise['image']) ?>" 
                             class="card-img-top" 
                             alt="<?= esc($merchandise['name']) ?>"
                             style="height: 500px; object-fit: cover;"
                             onerror="this.src='<?= base_url('assets/images/placeholder.svg') ?>'">
                        <div class="position-absolute top-0 end-0 m-3">
                            <?php if ($merchandise['status'] === 'out_of_stock'): ?>
                                <span class="badge bg-danger fs-6 px-3 py-2" style="border-radius: 25px;">Habis</span>
                            <?php elseif ($merchandise['status'] === 'discontinued'): ?>
                                <span class="badge bg-secondary fs-6 px-3 py-2" style="border-radius: 25px;">Tidak Tersedia</span>
                            <?php else: ?>
                                <span class="badge bg-success fs-6 px-3 py-2" style="border-radius: 25px;">Tersedia</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h1 class="card-title"><?= esc($merchandise['name']) ?></h1>
                            <?php if ($merchandise['status'] === 'out_of_stock'): ?>
                                <span class="badge bg-danger">Habis</span>
                            <?php elseif ($merchandise['status'] === 'discontinued'): ?>
                                <span class="badge bg-secondary">Tidak Tersedia</span>
                            <?php else: ?>
                                <span class="badge bg-success">Tersedia</span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="price-section mb-4">
                            <h2 class="text-primary">Rp <?= number_format($merchandise['price'], 0, ',', '.') ?></h2>
                            <p class="text-muted">
                                <i class="fas fa-box me-1"></i>Stok: <?= $merchandise['stock'] ?> item
                            </p>
                        </div>
                        
                        <div class="description-section mb-4">
                            <h4>Deskripsi Produk</h4>
                            <p class="text-muted"><?= nl2br(esc($merchandise['description'])) ?></p>
                        </div>
                        
                        <div class="product-info mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <h6><i class="fas fa-tag text-primary me-2"></i>Kategori</h6>
                                    <p class="text-muted"><?= esc($merchandise['category']) ?></p>
                                </div>
                                <div class="col-6">
                                    <h6><i class="fas fa-box text-primary me-2"></i>Status</h6>
                                    <p class="text-muted"><?= ucfirst(str_replace('_', ' ', $merchandise['status'])) ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="action-buttons">
                            <?php if ($merchandise['status'] === 'available' && $merchandise['stock'] > 0): ?>
                                <div class="d-flex gap-2 mb-3">
                                    <div class="input-group" style="width: 120px;">
                                        <button class="btn btn-outline-secondary" type="button" onclick="decreaseQuantity()">-</button>
                                        <input type="number" class="form-control text-center" value="1" min="1" max="<?= $merchandise['stock'] ?>" id="quantity">
                                        <button class="btn btn-outline-secondary" type="button" onclick="increaseQuantity()">+</button>
                                    </div>
                                    <button class="btn btn-primary flex-fill" onclick="addToCart(<?= $merchandise['id'] ?>)">
                                        <i class="fas fa-shopping-cart me-2"></i>Tambah ke Keranjang
                                    </button>
                                </div>
                                <button class="btn btn-success w-100 mb-2">
                                    <i class="fas fa-credit-card me-2"></i>Beli Sekarang
                                </button>
                            <?php else: ?>
                                <button class="btn btn-secondary w-100 mb-2" disabled>
                                    <i class="fas fa-times me-2"></i>Tidak Tersedia
                                </button>
                            <?php endif; ?>
                            
                            <button class="btn btn-outline-primary w-100">
                                <i class="fas fa-share-alt me-2"></i>Bagikan Produk
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Products -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-4">Produk Lainnya</h3>
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <img src="<?= base_url('assets/images/placeholder.jpg') ?>" class="card-img-top" alt="Related Product">
                            <div class="card-body">
                                <h5 class="card-title">Produk Terkait</h5>
                                <p class="card-text">Deskripsi produk terkait lainnya.</p>
                                <div class="price-tag">Rp 50.000</div>
                                <a href="#" class="btn btn-primary mt-2">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function increaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        const max = parseInt(quantityInput.getAttribute('max'));
        const current = parseInt(quantityInput.value);
        
        if (current < max) {
            quantityInput.value = current + 1;
        }
    }
    
    function decreaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        const current = parseInt(quantityInput.value);
        
        if (current > 1) {
            quantityInput.value = current - 1;
        }
    }
    
    function addToCart(itemId) {
        const quantity = document.getElementById('quantity').value;
        // This would typically make an AJAX call to add item to cart
        alert(`Ditambahkan ke keranjang: ${quantity} item`);
    }
</script>
<?php
// End of merchandise detail page
?>
