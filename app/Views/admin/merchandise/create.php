<link rel="stylesheet" href="<?= base_url('assets/css/admin-forms.css') ?>">

<div class="admin-form-container">
    <div class="admin-form-header">
        <h2>🛍️ Tambah Merchandise Baru</h2>
        <p class="subtitle">Tambahkan produk merchandise menarik untuk dijual</p>
    </div>
    
    <form method="post" action="<?= base_url('admin/merchandise') ?>" enctype="multipart/form-data">
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
                    <input type="text" name="name" required placeholder="Contoh: Mug CVI Wirotaman Premium" value="<?= esc(old('name')) ?>" />
                    <div class="form-help">Buat nama produk yang menarik dan mudah diingat</div>
                </div>
                
                <div class="form-group">
                    <label>Deskripsi <span class="required">*</span></label>
                    <textarea name="description" required placeholder="Jelaskan detail produk, bahan yang digunakan, manfaat, dan keunggulan produk..."><?= esc(old('description')) ?></textarea>
                    <div class="form-help">Deskripsikan produk secara detail untuk menarik pembeli</div>
                </div>
                
                <div class="form-group">
                    <label>Kategori <span class="required">*</span></label>
                    <input type="text" name="category" required placeholder="Contoh: Aksesoris, Pakaian, Souvenir" value="<?= esc(old('category')) ?>" />
                </div>
            </div>
            
            <div class="form-section">
                <h4>💰 Harga & Stok</h4>
                
                <div class="form-group">
                    <label>Harga (Rp) <span class="required">*</span></label>
                    <input type="number" step="0.01" name="price" required placeholder="50000" value="<?= esc(old('price')) ?>" />
                    <div class="form-help">Harga jual produk dalam rupiah</div>
                </div>
                
                <div class="form-group">
                    <label>Stok Tersedia</label>
                    <input type="number" name="stock" value="<?= esc(old('stock', 0)) ?>" min="0" placeholder="100" />
                    <div class="form-help">Jumlah stok yang tersedia</div>
                </div>
                
                <div class="form-group">
                    <label>Status Produk</label>
                    <select name="status">
                        <option value="available" <?= old('status') === 'available' ? 'selected' : '' ?>>✅ Available - Produk tersedia</option>
                        <option value="out_of_stock" <?= old('status') === 'out_of_stock' ? 'selected' : '' ?>>⚠️ Out of Stock - Stok habis</option>
                        <option value="discontinued" <?= old('status') === 'discontinued' ? 'selected' : '' ?>>❌ Discontinued - Produk dihentikan</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>📞 Kontak & Media</h4>
            
            <div class="form-group">
                <label>Gambar Produk</label>
                <div class="file-upload-area" id="merch-upload-area" onclick="document.getElementById('merch-image-file-input').click()">
                    <input type="file" id="merch-image-file-input" name="image_file" accept="image/*" onchange="previewMerchImage(this)" />
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--gray-400); margin-bottom: 12px;">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="17 8 12 3 7 8"></polyline>
                        <line x1="12" y1="3" x2="12" y2="15"></line>
                    </svg>
                    <div class="file-upload-text">Klik atau seret gambar ke sini untuk upload</div>
                    <div class="file-upload-hint">Format: JPG, PNG, WEBP. Ukuran maksimal sesuai konfigurasi server.</div>
                </div>
                <div id="merch-image-preview">
                    <img id="merch-preview-img" src="" alt="Preview" />
                </div>
                <div class="form-help" style="margin-top: 12px;">Atau masukkan nama file/URL pada field gambar setelah upload (tetap didukung)</div>
                <input type="text" name="image" class="form-control" placeholder="(opsional) nama-file.jpg atau URL gambar" style="margin-top: 8px;" />
            </div>
            
            <div class="form-group">
                <label>Nomor WhatsApp</label>
                <input type="text" name="whatsapp_contact" placeholder="6281234567890" />
                <div class="form-help">Nomor WhatsApp untuk pemesanan</div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>📏 Variasi Produk</h4>
            
            <div class="form-group">
                <label>Ukuran Tersedia</label>
                <textarea name="sizes" placeholder="Contoh:&#10;S&#10;M&#10;L&#10;XL&#10;XXL"></textarea>
                <div class="form-help">Satu ukuran per baris</div>
            </div>
            
            <div class="form-group">
                <label>Warna Tersedia</label>
                <textarea name="colors" placeholder="Contoh:&#10;Putih&#10;Hitam&#10;Navy Blue&#10;Merah&#10;Hijau"></textarea>
                <div class="form-help">Satu warna per baris</div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>🔧 Spesifikasi Teknis</h4>
            
            <div class="form-group">
                <label>Spesifikasi Produk</label>
                <textarea name="specifications" placeholder="Contoh:&#10;Bahan: Stainless Steel 304&#10;Kapasitas: 500ml&#10;Berat: 350 gram&#10;Perawatan: Cuci dengan sabun lembut&#10;Garansi: 1 tahun"></textarea>
                <div class="form-help">Format: Key: Value, satu spesifikasi per baris</div>
            </div>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                💾 Simpan Merchandise
            </button>
            <a href="/admin/merchandise" class="btn btn-outline">
                ← Kembali ke Daftar Merchandise
            </a>
        </div>
    </form>
</div>
<script>
function previewMerchImage(input) {
    var file = input.files && input.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function(e) {
        var p = document.getElementById('merch-image-preview');
        var img = document.getElementById('merch-preview-img');
        img.src = e.target.result;
        p.style.display = 'block';
    };
    reader.readAsDataURL(file);
}

// Drag and Drop functionality
const uploadArea = document.getElementById('merch-upload-area');
const fileInput = document.getElementById('merch-image-file-input');

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
            previewMerchImage(fileInput);
        }
    }, false);
}
</script>

