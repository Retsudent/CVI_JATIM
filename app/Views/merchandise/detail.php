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
// If controller/router passed a normalized $product from DB, use it directly
if (isset($product) && is_array($product) && !empty($product)) {
    // Product data already available from database, no need to fetch from static array
    $product_id = $product_id ?? 'db';
} else {
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

// Only use static data if $product is not already set from database
if (!isset($product) || empty($product)) {
    $product = $products[$product_id] ?? $products['kaos-anniversary'];
}
}
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
                            <?php
                                $icon = $product['icon'] ?? 'fas fa-gift';
                                $imgUrl = null;
                                if (!empty($product['image'])) {
                                    $raw = trim((string)$product['image']);
                                    if (preg_match('#^(https?:)?//#i', $raw)) {
                                        $imgUrl = $raw;
                                    } elseif (strpos($raw, 'assets/') !== false || strpos($raw, '/assets/') !== false) {
                                        $imgUrl = base_url($raw);
                                    } else {
                                        $imgUrl = base_url('assets/images/merchandise/' . $raw);
                                    }
                                }
                            ?>
                            <?php if ($imgUrl): ?>
                                <div class="product-image" style="height:400px; overflow:hidden; display:flex; align-items:center; justify-content:center; cursor:pointer; background:#f6fff6;" onclick="openImageModal('<?= esc($imgUrl) ?>', '<?= htmlspecialchars($product['title']) ?>')">
                                    <img src="<?= esc($imgUrl) ?>" alt="<?= htmlspecialchars($product['title']) ?>" style="width:100%; height:100%; object-fit:cover; display:block;" onerror="this.style.display='none'" />
                                    <div class="position-absolute top-50 start-50 translate-middle">
                                        <i class="fas fa-search-plus fa-2x text-white" style="opacity: 0.7;"></i>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="product-placeholder" style="height: 400px; background: linear-gradient(135deg, var(--light-green), var(--pale-green)); display: flex; align-items: center; justify-content: center; cursor: pointer;" onclick="openImageModal('', '<?= htmlspecialchars($product['title']) ?>')">
                                    <i class="<?= $icon ?> fa-5x" style="color: var(--accent-green);"></i>
                                    <div class="position-absolute top-50 start-50 translate-middle">
                                        <i class="fas fa-search-plus fa-2x text-white" style="opacity: 0.7;"></i>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-success fs-6"><?= ucfirst($product['status']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Thumbnail Images -->
                <div class="row g-2">
                    <div class="col-3">
                        <div class="card" style="cursor: pointer;" onclick="openImageModal('<?= esc($imgUrl ?? '') ?>', '<?= htmlspecialchars($product['title']) ?>')">
                            <div class="card-body p-2 text-center">
                                <!-- Merchandise images hidden here by request; show icon instead -->
                                <i class="<?= $icon ?> fa-2x" style="color: var(--accent-green);"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                            <div class="card" style="cursor: pointer;" onclick="openImageModal('<?= esc($imgUrl ?? '') ?>', '<?= htmlspecialchars($product['title']) ?>')">
                            <div class="card-body p-2 text-center">
                                <!-- Merchandise images hidden here by request; show icon instead -->
                                <i class="<?= $icon ?> fa-2x" style="color: var(--accent-green);"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="cursor: pointer;" onclick="openImageModal('<?= esc($imgUrl ?? '') ?>', '<?= htmlspecialchars($product['title']) ?>')">
                            <div class="card-body p-2 text-center">
                                <!-- Merchandise images hidden here by request; show icon instead -->
                                <i class="<?= $icon ?> fa-2x" style="color: var(--accent-green);"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="cursor: pointer;" onclick="openImageModal('<?= $product['image'] ?>', '<?= $product['title'] ?>')">
                            <div class="card-body p-2 text-center">
                                <i class="<?= $icon ?> fa-2x" style="color: var(--accent-green);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-1"><?= $product['title'] ?></h2>
                        <div class="mb-3">
                            <span class="badge bg-secondary">
                                Kategori: <?= htmlspecialchars($product['category'] ?? '-') ?>
                            </span>
                        </div>
                        
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
                        
                        
                        <?php if (count($product['sizes']) > 1): ?>
                        <!-- Size Selection -->
                        <div class="mb-4">
                            <h6>Ukuran</h6>
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
                            <h6>Warna</h6>
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
                            <div class="small text-muted mb-2">Stok tersedia: <?= (int)($product['stock'] ?? 0) ?></div>
                            <div class="quantity-selector">
                                <button class="btn btn-outline-secondary quantity-btn" type="button" id="qty-decrease">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" class="form-control quantity-input" id="quantity" value="1" min="1" max="<?= (int)($product['stock'] ?? 0) ?>">
                                <button class="btn btn-outline-secondary quantity-btn" type="button" id="qty-increase">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-2">
                            <?php $wa = $product['whatsapp_contact'] ?? ''; $wa = preg_replace('/[^0-9]/','', (string)$wa); if ($wa==='') { $wa = '6283134846000'; } ?>
                            <?php $priceNumber = (int) preg_replace('/[^0-9]/', '', (string)($product['price'] ?? '0')); ?>
                            <button type="button" id="wa-order-btn" 
                                class="btn btn-success btn-lg" 
                                style="background: linear-gradient(135deg, #25D366, #128C7E); border: none; border-radius: 25px;"
                                data-wa="<?= $wa ?>"
                                data-title="<?= htmlspecialchars($product['title']) ?>"
                                data-price="<?= $priceNumber ?>">
                                <i class="fab fa-whatsapp me-2"></i>Pesan via WhatsApp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Build detailed WhatsApp order message from selected options
document.getElementById('wa-order-btn').addEventListener('click', function() {
    var btn = this;
    var wa = btn.getAttribute('data-wa');
    var title = btn.getAttribute('data-title');
    var price = parseInt(btn.getAttribute('data-price') || '0', 10);

    // Selected size
    var sizeEl = document.querySelector('input[name="size"]:checked');
    var size = sizeEl ? sizeEl.value : '';

    // Selected color
    var colorEl = document.querySelector('input[name="color"]:checked');
    var color = colorEl ? colorEl.value : '';

    // Quantity
    var qty = parseInt(document.getElementById('quantity').value || '1', 10);
    if (!qty || qty < 1) qty = 1;

    var subtotal = price * qty;
    function formatRupiah(n) {
        return 'Rp ' + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    var text = '';
    text += 'Pesanan Produk: ' + title + "\n";
    text += 'Harga satuan: ' + formatRupiah(price) + "\n";
    if (size) text += 'Ukuran: ' + size + "\n";
    if (color) text += 'Warna: ' + color + "\n";
    text += 'Jumlah: ' + qty + "\n";
    text += 'Subtotal: ' + formatRupiah(subtotal) + "\n\n";
    text += 'Nama: (isi nama Anda)\nAlamat: (isi alamat pengiriman)\nCatatan: (opsional)';

    var waUrl = 'https://wa.me/' + wa + '?text=' + encodeURIComponent(text);
    window.open(waUrl, '_blank');
});
</script>

<!-- Product Details Tabs -->
<section class="py-5" style="background: linear-gradient(135deg, #f8fff8 0%, #e6ffe6 100%);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="productTabs" role="tablist" style="gap: 16px; white-space: nowrap;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">
                                    Informasi
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
                                <h5>Informasi Produk</h5>
                                <p><?= nl2br(htmlspecialchars($product['description'] ?? '')) ?></p>
                            </div>
                            
                            <div class="tab-pane fade" id="specification" role="tabpanel">
                                <h5>Spesifikasi Teknis</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <?php 
                                            $specArray = is_array($product['specifications'] ?? null) ? $product['specifications'] : [];
                                            if (count($specArray) === 0) {
                                                $raw = trim((string)($product['specifications_raw'] ?? ''));
                                                echo '<tr><td colspan="2" class="text-muted">' . ($raw !== '' ? nl2br(htmlspecialchars($raw)) : 'Belum ada spesifikasi.') . '</td></tr>';
                                            } else {
                                                $specs = array_chunk($specArray, (int)max(1, ceil(count($specArray) / 2)), true);
                                                foreach ($specs[0] as $key => $value): 
                                            ?>
                                            <tr>
                                                <td><strong><?= $key ?>:</strong></td>
                                                <td><?= $value ?></td>
                                            </tr>
                                            <?php endforeach; } ?>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <?php if (!empty($specs[1])): ?>
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
                                <div class="mb-3" style="text-align: left;">
                                    <a href="/merchandise/review/<?= htmlspecialchars($product['id'] ?? '') ?>" class="btn btn-success">
                                        📝 Berikan Ulasan
                                    </a>
                                </div>
                                <?php
                                $reviews = [];
                                try {
                                    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                                    $stmt = $pdo->prepare('SELECT * FROM merchandise_reviews WHERE merchandise_id = :id AND is_approved = true ORDER BY created_at DESC LIMIT 10');
                                    $stmt->execute([':id' => $product['id'] ?? 0]);
                                    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                } catch (Throwable $e) {
                                    $reviews = [];
                                }
                                ?>
                                <?php if (empty($reviews)): ?>
                                    <div class="card">
                                        <div class="card-body text-center text-muted">
                                            Belum ada ulasan untuk produk ini. Jadilah yang pertama!
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div style="max-height: 420px; overflow-y: auto; padding-right: 6px;">
                                        <?php foreach ($reviews as $review): ?>
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <h6 class="card-title mb-0"><?= htmlspecialchars($review['customer_name']) ?></h6>
                                                        <div class="text-warning">
                                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                <i class="fas fa-star<?= $i <= (int)$review['rating'] ? '' : '-o' ;?>"></i>
                                                            <?php endfor; ?>
                                                        </div>
                                                    </div>
                                                    <?php if (!empty($review['comment'])): ?>
                                                        <p class="card-text small"><?= nl2br(htmlspecialchars($review['comment'])) ?></p>
                                                    <?php endif; ?>
                                                    <small class="text-muted"><?= date('d F Y', strtotime($review['created_at'])) ?></small>
                                                    <?php if (!empty($review['admin_response'])): ?>
                                                        <div class="mt-2 p-2" style="background: #e3f2fd; border-left: 4px solid #2196f3; border-radius: 6px;">
                                                            <strong style="color:#1976d2;">Respon Admin:</strong>
                                                            <div class="small" style="color:#1976d2;"><?= nl2br(htmlspecialchars($review['admin_response'])) ?></div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products (only for static example data) -->
<?php if (isset($products) && is_array($products)): ?>
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
                if ($count >= 3) break; ?>
            <div class="col-lg-3 col-md-6">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <div class="position-relative">
                            <div class="product-placeholder" style="height: 200px; background: linear-gradient(135deg, var(--pale-green), var(--mint-green)); display: flex; align-items: center; justify-content: center;">
                                <i class="<?= $related_product['icon'] ?? 'fas fa-gift' ?> fa-3x" style="color: var(--accent-green);"></i>
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
            <?php $count++; endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<script>
function openImageModal(imageUrl, title) {
    // Create modal HTML
    const modalHtml = `
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">${title}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="${imageUrl}" class="img-fluid" alt="${title}" style="max-height: 80vh; border-radius: 8px;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Remove existing modal if any
    const existingModal = document.getElementById('imageModal');
    if (existingModal) {
        existingModal.remove();
    }
    
    // Add modal to body
    document.body.insertAdjacentHTML('beforeend', modalHtml);
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
    
    // Clean up modal when hidden
    document.getElementById('imageModal').addEventListener('hidden.bs.modal', function() {
        this.remove();
    });
}

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

<script>
// Quantity controls that respect product stock
document.addEventListener('DOMContentLoaded', function() {
    const qtyInput = document.getElementById('quantity');
    const btnInc = document.getElementById('qty-increase');
    const btnDec = document.getElementById('qty-decrease');
    const stock = parseInt('<?= (int)($product['stock'] ?? 0) ?>', 10) || 0;

    function clampQty() {
        let val = parseInt(qtyInput.value) || 1;
        if (val < 1) val = 1;
        if (stock > 0 && val > stock) val = stock;
        qtyInput.value = val;
    }

    if (qtyInput) {
        // ensure max attribute reflects stock
        qtyInput.setAttribute('max', Math.max(1, stock));
        qtyInput.addEventListener('change', clampQty);
        qtyInput.addEventListener('input', clampQty);
    }

    if (btnInc) {
        btnInc.addEventListener('click', function() {
            let v = parseInt(qtyInput.value) || 1;
            if (stock === 0) return;
            if (v < stock) {
                qtyInput.value = v + 1;
            }
        });
    }

    if (btnDec) {
        btnDec.addEventListener('click', function() {
            let v = parseInt(qtyInput.value) || 1;
            if (v > 1) {
                qtyInput.value = v - 1;
            }
        });
    }
});
</script>
