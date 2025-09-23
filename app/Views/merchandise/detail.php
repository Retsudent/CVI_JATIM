<style>
/* Custom styles for quantity selector */
.quantity-selector {
    display: flex;
    align-items: center;
    gap: 8px;
    width: fit-content;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border: 2px solid var(--accent-green);
    border-radius: 12px;
    padding: 4px;
    box-shadow: 0 4px 12px rgba(45, 80, 22, 0.2);
    transition: all 0.3s ease;
}

.quantity-selector:hover {
    box-shadow: 0 6px 16px rgba(45, 80, 22, 0.3);
    transform: translateY(-1px);
}

.quantity-btn {
    width: 40px !important;
    height: 40px !important;
    border-radius: 8px !important;
    background: linear-gradient(135deg, var(--light-green) 0%, var(--pale-green) 100%) !important;
    border: 2px solid var(--accent-green) !important;
    color: var(--primary-green) !important;
    font-weight: 700 !important;
    font-size: 16px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: all 0.3s ease !important;
    padding: 0 !important;
}

.quantity-btn:hover {
    background: linear-gradient(135deg, var(--accent-green) 0%, var(--light-green) 100%) !important;
    color: white !important;
    transform: translateY(-1px) !important;
    box-shadow: 0 4px 8px rgba(45, 80, 22, 0.3) !important;
}

.quantity-input {
    width: 60px !important;
    height: 40px !important;
    border: 2px solid var(--accent-green) !important;
    border-radius: 8px !important;
    background: linear-gradient(135deg, #ffffff 0%, #f0fff0 100%) !important;
    color: var(--primary-green) !important;
    font-weight: 700 !important;
    font-size: 16px !important;
    text-align: center !important;
    padding: 0 !important;
    margin: 0 !important;
    transition: all 0.3s ease !important;
}

.quantity-input:focus {
    border-color: var(--accent-green) !important;
    box-shadow: 0 0 0 0.2rem rgba(107, 142, 35, 0.25) !important;
    outline: none !important;
    background: linear-gradient(135deg, #ffffff 0%, #f0fff0 100%) !important;
    transform: scale(1.02) !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .quantity-selector {
        gap: 6px;
        padding: 3px;
    }
    
    .quantity-btn {
        width: 36px !important;
        height: 36px !important;
        font-size: 14px !important;
    }
    
    .quantity-input {
        width: 50px !important;
        height: 36px !important;
        font-size: 14px !important;
    }
}
</style>

<?php
// Product data based on ID
$product_id = $product_id ?? 'kaos-anniversary';

$products = [
    'kaos-anniversary' => [
        'title' => 'Kaos Event Anniversary CVI WIROTAMAN 2nd',
        'price' => 'Rp 100.000',
        'category' => 'apparel',
        'status' => 'available',
        'rating' => 4.8,
        'reviews' => 15,
        'image' => 'https://cviwirotaman.web.id/assets/img/merchandise/kaos-anniversary.jpg',
        'description' => 'Kaos eksklusif dengan desain khusus untuk memperingati Anniversary CVI Wirotaman ke-2. Dibuat dengan bahan katun 100% yang nyaman dipakai untuk berbagai aktivitas outdoor. Desain yang menarik dan berkualitas tinggi, cocok untuk koleksi merchandise CVI Wirotaman.',
        'specifications' => [
            'Bahan' => 'Katun 100%',
            'Berat' => '200 gram',
            'Ukuran' => 'S, M, L, XL, XXL',
            'Warna' => 'Putih, Hitam, Navy',
            'Teknik Sablon' => 'DTF (Direct to Film)',
            'Perawatan' => 'Cuci dengan air dingin',
            'Garansi' => '1 tahun',
            'Stok' => '50 pcs tersedia'
        ],
        'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
        'colors' => ['Putih', 'Hitam', 'Navy'],
        'icon' => 'fas fa-tshirt'
    ],
    'tumbler-putih' => [
        'title' => 'Tumbler Putih Event Anniversary CVI WIROTAMAN 2nd',
        'price' => 'Rp 45.000',
        'category' => 'accessories',
        'status' => 'available',
        'rating' => 4.6,
        'reviews' => 12,
        'image' => 'https://cviwirotaman.web.id/assets/img/merchandise/tumbler-putih.jpg',
        'description' => 'Tumbler putih dengan desain eksklusif Anniversary CVI Wirotaman ke-2. Terbuat dari stainless steel berkualitas tinggi dengan kapasitas 500ml. Cocok untuk menemani aktivitas outdoor dan sehari-hari.',
        'specifications' => [
            'Bahan' => 'Stainless Steel 304',
            'Kapasitas' => '500ml',
            'Warna' => 'Putih',
            'Teknik Sablon' => 'Laser Engraving',
            'Perawatan' => 'Cuci dengan sabun lembut',
            'Garansi' => '6 bulan',
            'Stok' => '30 pcs tersedia'
        ],
        'sizes' => ['500ml'],
        'colors' => ['Putih'],
        'icon' => 'fas fa-coffee'
    ],
    'tumbler-hitam' => [
        'title' => 'Tumbler Hitam Event Anniversary CVI WIROTAMAN 2nd',
        'price' => 'Rp 45.000',
        'category' => 'accessories',
        'status' => 'available',
        'rating' => 4.7,
        'reviews' => 18,
        'image' => 'https://cviwirotaman.web.id/assets/img/merchandise/tumbler-hitam.jpg',
        'description' => 'Tumbler hitam dengan desain eksklusif Anniversary CVI Wirotaman ke-2. Terbuat dari stainless steel berkualitas tinggi dengan kapasitas 500ml. Desain elegan dan tahan lama untuk aktivitas outdoor.',
        'specifications' => [
            'Bahan' => 'Stainless Steel 304',
            'Kapasitas' => '500ml',
            'Warna' => 'Hitam',
            'Teknik Sablon' => 'Laser Engraving',
            'Perawatan' => 'Cuci dengan sabun lembut',
            'Garansi' => '6 bulan',
            'Stok' => '25 pcs tersedia'
        ],
        'sizes' => ['500ml'],
        'colors' => ['Hitam'],
        'icon' => 'fas fa-coffee'
    ],
    'tumbler-set' => [
        'title' => 'Tumbler Set Vacuum Flask Event Anniversary CVI WIROTAMAN 2nd',
        'price' => 'Rp 60.000',
        'category' => 'accessories',
        'status' => 'available',
        'rating' => 4.9,
        'reviews' => 22,
        'image' => 'https://cviwirotaman.web.id/assets/img/merchandise/tumbler-set.jpg',
        'description' => 'Set tumbler vacuum flask dengan desain eksklusif Anniversary CVI Wirotaman ke-2. Terdiri dari 2 buah tumbler dengan kapasitas berbeda (350ml dan 500ml). Perfect untuk pasangan atau koleksi pribadi.',
        'specifications' => [
            'Bahan' => 'Stainless Steel 304',
            'Kapasitas' => '350ml + 500ml',
            'Warna' => 'Putih, Hitam',
            'Teknik Sablon' => 'Laser Engraving',
            'Perawatan' => 'Cuci dengan sabun lembut',
            'Garansi' => '6 bulan',
            'Stok' => '20 set tersedia'
        ],
        'sizes' => ['Set (350ml + 500ml)'],
        'colors' => ['Putih', 'Hitam'],
        'icon' => 'fas fa-gift'
    ]
];

$product = $products[$product_id] ?? $products['kaos-anniversary'];
?>

<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content text-center">
            <!-- Page Icon Above Title -->
            <div class="mb-3">
                <i class="fas fa-shopping-bag fa-4x" style="color: var(--accent-green);"></i>
            </div>
            
            <!-- Page Title Below Icon -->
            <h1 class="hero-title">
                Detail Merchandise
            </h1>
            <p class="hero-subtitle">
                Informasi lengkap tentang merchandise CVI Wirotaman
            </p>
        </div>
    </div>
</section>

<!-- Merchandise Detail Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body p-0">
                    <div class="position-relative">
                            <div class="product-placeholder" style="height: 400px; background: linear-gradient(135deg, var(--light-green), var(--pale-green)); display: flex; align-items: center; justify-content: center;">
                                <i class="<?= $product['icon'] ?> fa-5x" style="color: var(--accent-green);"></i>
                            </div>
                        <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-success fs-6"><?= ucfirst($product['status']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Thumbnail Images -->
                <div class="row g-2">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <i class="<?= $product['icon'] ?> fa-2x" style="color: var(--accent-green);"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <i class="<?= $product['icon'] ?> fa-2x" style="color: var(--accent-green);"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <i class="<?= $product['icon'] ?> fa-2x" style="color: var(--accent-green);"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <i class="<?= $product['icon'] ?> fa-2x" style="color: var(--accent-green);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-3"><?= $product['title'] ?></h2>
                        
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="text-warning me-2">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star<?= $i <= floor($product['rating']) ? '' : '-o' ?>"></i>
                                    <?php endfor; ?>
                                </span>
                                <span class="text-muted">(<?= $product['rating'] ?>) <?= $product['reviews'] ?> ulasan</span>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-success fw-bold"><?= $product['price'] ?></h3>
                            <small class="text-muted">Harga sudah termasuk ongkos kirim</small>
                        </div>
                        
                        <div class="mb-4">
                            <h6>Deskripsi Produk</h6>
                            <p class="card-text">
                                <?= $product['description'] ?>
                            </p>
                        </div>
                        
                        <div class="mb-4">
                            <h6>Spesifikasi</h6>
                            <ul class="list-unstyled">
                                <?php foreach ($product['specifications'] as $key => $value): ?>
                                <li class="mb-2"><i class="fas fa-check me-2" style="color: var(--accent-green);"></i><strong><?= $key ?>:</strong> <?= $value ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <?php if (count($product['sizes']) > 1): ?>
                        <!-- Size Selection -->
                        <div class="mb-4">
                            <h6>Pilih Ukuran</h6>
                            <div class="btn-group" role="group">
                                <?php foreach ($product['sizes'] as $index => $size): ?>
                                <input type="radio" class="btn-check" name="size" id="size-<?= $index ?>" value="<?= $size ?>" <?= $index === 0 ? 'checked' : '' ?>>
                                <label class="btn btn-outline-primary" for="size-<?= $index ?>"><?= $size ?></label>
                                <?php endforeach; ?>
                                </div>
                                </div>
                        <?php endif; ?>
                        
                        <?php if (count($product['colors']) > 1): ?>
                        <!-- Color Selection -->
                        <div class="mb-4">
                            <h6>Pilih Warna</h6>
                            <div class="btn-group" role="group">
                                <?php foreach ($product['colors'] as $index => $color): ?>
                                <input type="radio" class="btn-check" name="color" id="color-<?= $index ?>" value="<?= $color ?>" <?= $index === 0 ? 'checked' : '' ?>>
                                <label class="btn btn-outline-dark" for="color-<?= $index ?>"><?= $color ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Quantity -->
                        <div class="mb-4">
                            <h6 class="mb-3">
                                <i class="fas fa-sort-numeric-up me-2" style="color: var(--accent-green);"></i>
                                Jumlah
                            </h6>
                            <div class="quantity-selector">
                                <button class="btn btn-outline-secondary quantity-btn" type="button" onclick="decreaseQuantity()">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" class="form-control quantity-input" id="quantity" value="1" min="1" max="10">
                                <button class="btn btn-outline-secondary quantity-btn" type="button" onclick="increaseQuantity()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg" onclick="addToCart()">
                                <i class="fas fa-shopping-cart me-2"></i>Tambah ke Keranjang
                            </button>
                            <button class="btn btn-outline-primary btn-lg" onclick="buyNow()">
                                <i class="fas fa-bolt me-2"></i>Beli Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Details Tabs -->
<section class="py-5" style="background: linear-gradient(135deg, #f8fff8 0%, #e6ffe6 100%);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="productTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">
                                    Deskripsi
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="specification-tab" data-bs-toggle="tab" data-bs-target="#specification" type="button" role="tab">
                                    Spesifikasi
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">
                                    Ulasan (<?= $product['reviews'] ?>)
                                </button>
                            </li>
                        </ul>
                        
                        <div class="tab-content mt-4" id="productTabsContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                <h5>Deskripsi Lengkap</h5>
                                <p>
                                    <?= $product['description'] ?>
                                </p>
                                <p>
                                    Produk ini merupakan bagian dari koleksi merchandise eksklusif CVI Wirotaman yang dirancang khusus 
                                    untuk memperingati Anniversary ke-2 komunitas. Setiap item dibuat dengan standar kualitas tinggi 
                                    dan desain yang mencerminkan semangat komunitas pecinta alam.
                                </p>
                            </div>
                            
                            <div class="tab-pane fade" id="specification" role="tabpanel">
                                <h5>Spesifikasi Teknis</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <?php 
                                            $specs = array_chunk($product['specifications'], ceil(count($product['specifications']) / 2), true);
                                            foreach ($specs[0] as $key => $value): 
                                            ?>
                                            <tr>
                                                <td><strong><?= $key ?>:</strong></td>
                                                <td><?= $value ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <?php if (isset($specs[1])): ?>
                                            <?php foreach ($specs[1] as $key => $value): ?>
                                            <tr>
                                                <td><strong><?= $key ?>:</strong></td>
                                                <td><?= $value ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <h5>Ulasan Pelanggan</h5>
                <div class="row">
                                    <div class="col-12">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h6 class="card-title mb-0">Ahmad Rizki</h6>
                                                    <div class="text-warning">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="card-text small">Kualitas <?= strtolower($product['category']) ?> sangat bagus, bahan nyaman dipakai. Desainnya juga menarik dan sesuai ekspektasi.</p>
                                                <small class="text-muted">2 hari yang lalu</small>
                                            </div>
                                        </div>
                                        
                                        <div class="card mb-3">
                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h6 class="card-title mb-0">Siti Nurhaliza</h6>
                                                    <div class="text-warning">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="card-text small">Pengiriman cepat dan packing rapi. <?= ucfirst($product['category']) ?> sesuai dengan yang dipesan, ukuran pas.</p>
                                                <small class="text-muted">1 minggu yang lalu</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="py-5">
    <div class="container">
        <div class="section-title">
            <h2>Produk Terkait</h2>
            <p>Merchandise lainnya dari CVI Wirotaman</p>
        </div>
        
        <div class="row g-4">
            <?php 
            $related_products = array_filter($products, function($key) use ($product_id) {
                return $key !== $product_id;
            }, ARRAY_FILTER_USE_KEY);
            
            $count = 0;
            foreach ($related_products as $key => $related_product): 
                if ($count >= 3) break;
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <div class="position-relative">
                            <div class="product-placeholder" style="height: 200px; background: linear-gradient(135deg, var(--pale-green), var(--mint-green)); display: flex; align-items: center; justify-content: center;">
                                <i class="<?= $related_product['icon'] ?> fa-3x" style="color: var(--accent-green);"></i>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="card-title"><?= $related_product['title'] ?></h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold"><?= $related_product['price'] ?></span>
                                <a href="<?= base_url('merchandise/' . $key) ?>" class="btn btn-outline-primary btn-sm">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            $count++;
            endforeach; 
            ?>
        </div>
    </div>
</section>

<script>
function increaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value);
    if (currentValue < 10) {
        quantityInput.value = currentValue + 1;
        // Force update display
        quantityInput.style.display = 'none';
        quantityInput.offsetHeight; // Trigger reflow
        quantityInput.style.display = 'block';
    }
}

function decreaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
        // Force update display
        quantityInput.style.display = 'none';
        quantityInput.offsetHeight; // Trigger reflow
        quantityInput.style.display = 'block';
    }
}

// Ensure input is visible on page load
document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('quantity');
    if (quantityInput) {
        // Force initial display
        quantityInput.style.opacity = '1';
        quantityInput.style.visibility = 'visible';
        quantityInput.style.display = 'block';
        
        // Add change event listener
        quantityInput.addEventListener('change', function() {
            this.style.opacity = '1';
            this.style.visibility = 'visible';
        });
    }
});

function addToCart() {
    const size = document.querySelector('input[name="size"]:checked')?.value || 'Default';
    const color = document.querySelector('input[name="color"]:checked')?.value || 'Default';
    const quantity = document.getElementById('quantity').value;
    
    alert(`Ditambahkan ke keranjang:\n- Ukuran: ${size}\n- Warna: ${color}\n- Jumlah: ${quantity}`);
}

function buyNow() {
    const size = document.querySelector('input[name="size"]:checked')?.value || 'Default';
    const color = document.querySelector('input[name="color"]:checked')?.value || 'Default';
    const quantity = document.getElementById('quantity').value;
    const price = <?= str_replace(['Rp ', '.'], '', $product['price']) ?>;
    
    alert(`Beli Sekarang:\n- Ukuran: ${size}\n- Warna: ${color}\n- Jumlah: ${quantity}\n\nTotal: Rp ${(price * quantity).toLocaleString('id-ID')}`);
}
</script>