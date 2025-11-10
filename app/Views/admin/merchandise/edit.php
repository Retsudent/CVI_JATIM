<link rel="stylesheet" href="<?= base_url('assets/css/admin-forms.css') ?>">

<div class="admin-form-container">
    <div class="admin-form-header">
        <h2>✏️ Edit Merchandise</h2>
        <p class="subtitle">Update informasi produk merchandise yang sudah ada</p>
    </div>
    
    <form method="post" action="/admin/merchandise/edit/<?= htmlspecialchars($product['id']) ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <?php $sess = session(); ?>
        <?php if ($sess->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= esc($sess->getFlashdata('success')) ?></div>
        <?php endif; ?>
        <?php if ($sess->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= $sess->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if (!empty(session()->getFlashdata('errors'))): ?>
            <div class="alert alert-danger">
                <ul>
                <?php foreach (session()->getFlashdata('errors') as $err): ?>
                    <li><?= esc($err) ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="form-grid">
            <div class="form-section">
                <h4>📝 Informasi Produk</h4>
                
                <div class="form-group">
                    <label>Nama Produk <span class="required">*</span></label>
                    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required placeholder="Contoh: Mug CVI Wirotaman Premium" />
                    <div class="form-help">Buat nama produk yang menarik dan mudah diingat</div>
                </div>
                
                <div class="form-group">
                    <label>Deskripsi <span class="required">*</span></label>
                    <textarea name="description" required placeholder="Jelaskan detail produk, bahan yang digunakan, manfaat, dan keunggulan produk..."><?= htmlspecialchars($product['description']) ?></textarea>
                    <div class="form-help">Deskripsikan produk secara detail untuk menarik pembeli</div>
                </div>
                
                <div class="form-group">
                    <label>Kategori <span class="required">*</span></label>
                    <input type="text" name="category" value="<?= htmlspecialchars($product['category']) ?>" required placeholder="Contoh: Aksesoris, Pakaian, Souvenir" />
                </div>
            </div>
            
            <div class="form-section">
                <h4>💰 Harga & Stok</h4>
                
                <div class="form-group">
                    <label>Harga (Rp) <span class="required">*</span></label>
                    <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']) ?>" required placeholder="50000" />
                    <div class="form-help">Harga jual produk dalam rupiah</div>
                </div>
                
                <div class="form-group">
                    <label>Stok Tersedia</label>
                    <input type="number" name="stock" value="<?= htmlspecialchars($product['stock']) ?>" min="0" placeholder="100" />
                    <div class="form-help">Jumlah stok yang tersedia</div>
                </div>
                
                <div class="form-group">
                    <label>Status Produk</label>
                    <select name="status">
                        <option value="available" <?= $product['status']==='available'?'selected':'' ?>>✅ Available - Produk tersedia</option>
                        <option value="out_of_stock" <?= $product['status']==='out_of_stock'?'selected':'' ?>>⚠️ Out of Stock - Stok habis</option>
                        <option value="discontinued" <?= $product['status']==='discontinued'?'selected':'' ?>>❌ Discontinued - Produk dihentikan</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>⭐ Rating & Ulasan</h4>
            
            <div class="form-group">
                <label>Rating (0-5)</label>
                <input type="number" step="0.1" min="0" max="5" name="rating" value="<?= htmlspecialchars($product['rating']) ?>" placeholder="4.5" />
                <div class="form-help">Rating produk dari 0 sampai 5</div>
            </div>
            
            <div class="form-group">
                <label>Jumlah Ulasan</label>
                <input type="number" min="0" name="reviews" value="<?= htmlspecialchars($product['reviews']) ?>" placeholder="25" />
                <div class="form-help">Jumlah ulasan yang sudah diterima</div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>📞 Kontak & Media</h4>
            
            <div class="form-group">
                <label>Gambar Produk</label>
                <?php if (!empty($product['image'])): ?>
                <div class="image-preview" style="margin-bottom: 16px;">
                    <div style="margin-bottom: 8px; font-weight: 600; color: var(--gray-700);">Gambar Saat Ini:</div>
                    <img src="<?= esc($product['image']) ?>" alt="Current image" />
                    <div style="margin-top: 8px;">
                        <a href="<?= esc($product['image']) ?>" target="_blank" class="btn btn-secondary" style="font-size: 13px; padding: 8px 16px;">Lihat Gambar</a>
                    </div>
                </div>
                <?php endif; ?>
                <div class="file-upload-area" id="merch-edit-upload-area" onclick="document.getElementById('merch-edit-image-file-input').click()">
                    <input type="file" id="merch-edit-image-file-input" name="image_file" accept="image/*" onchange="previewMerchEditImage(this)" />
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--gray-400); margin-bottom: 12px;">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="17 8 12 3 7 8"></polyline>
                        <line x1="12" y1="3" x2="12" y2="15"></line>
                    </svg>
                    <div class="file-upload-text">Klik atau seret gambar baru ke sini untuk upload</div>
                    <div class="file-upload-hint">Format: JPG, PNG, WEBP. Ukuran maksimal sesuai konfigurasi server.</div>
                </div>
                <div id="merch-edit-image-preview">
                    <img id="merch-edit-preview-img" src="" alt="Preview" />
                </div>
                <div class="form-help" style="margin-top: 12px;">Atau masukkan nama file/URL pada field gambar setelah upload (tetap didukung)</div>
                <input type="text" name="image" class="form-control" value="<?= htmlspecialchars($product['image']) ?>" placeholder="(opsional) nama-file.jpg atau URL gambar" style="margin-top: 8px;" />
            </div>
            
            <div class="form-group">
                <label>Nomor WhatsApp</label>
                <input type="text" name="whatsapp_contact" value="<?= htmlspecialchars($product['whatsapp_contact']) ?>" placeholder="6281234567890" />
                <div class="form-help">Nomor WhatsApp untuk pemesanan</div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>📏 Variasi Produk</h4>
            
            <div class="form-group">
                <label>Ukuran Tersedia</label>
                <textarea name="sizes" placeholder="Contoh:&#10;S&#10;M&#10;L&#10;XL&#10;XXL"><?= htmlspecialchars($product['sizes']) ?></textarea>
                <div class="form-help">Satu ukuran per baris</div>
            </div>
            
            <div class="form-group">
                <label>Warna Tersedia</label>
                <textarea name="colors" placeholder="Contoh:&#10;Putih&#10;Hitam&#10;Navy Blue&#10;Merah&#10;Hijau"><?= htmlspecialchars($product['colors']) ?></textarea>
                <div class="form-help">Satu warna per baris</div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>🔧 Spesifikasi Teknis</h4>
            
            <div class="form-group">
                <label>Spesifikasi Produk</label>
                <textarea name="specifications" placeholder="Contoh:&#10;Bahan: Stainless Steel 304&#10;Kapasitas: 500ml&#10;Berat: 350 gram&#10;Perawatan: Cuci dengan sabun lembut&#10;Garansi: 1 tahun"><?= htmlspecialchars($product['specifications']) ?></textarea>
                <div class="form-help">Format: Key: Value, satu spesifikasi per baris</div>
            </div>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                💾 Update Merchandise
            </button>
            <a href="/admin/merchandise" class="btn btn-outline">
                ← Kembali ke Daftar Merchandise
            </a>
        </div>
    </form>
</div>
<script>
function previewMerchEditImage(input) {
    var file = input.files && input.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function(e) {
        var p = document.getElementById('merch-edit-image-preview');
        var img = document.getElementById('merch-edit-preview-img');
        img.src = e.target.result;
        p.style.display = 'block';
    };
    reader.readAsDataURL(file);
}

// Drag and Drop functionality
const uploadArea = document.getElementById('merch-edit-upload-area');
const fileInput = document.getElementById('merch-edit-image-file-input');

if (uploadArea && fileInput) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, () => {
            uploadArea.classList.add('dragover');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, () => {
            uploadArea.classList.remove('dragover');
        }, false);
    });

    uploadArea.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        if (files.length > 0) {
            fileInput.files = files;
            previewMerchEditImage(fileInput);
        }
    }, false);
}
</script>

