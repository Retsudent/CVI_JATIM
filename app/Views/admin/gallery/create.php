<link rel="stylesheet" href="<?= base_url('assets/css/admin-forms.css') ?>">

<div class="admin-form-container">
    <div class="admin-form-header">
        <h2>📸 Upload Foto Gallery Baru</h2>
        <p class="subtitle">Tambahkan foto menarik untuk gallery website</p>
    </div>
    
    <form method="post" action="/admin/gallery" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <?php $sess = session(); ?>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= esc($error) ?></div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?= esc($success) ?></div>
        <?php endif; ?>
        <div class="form-section">
            <h4>📝 Informasi Foto</h4>
            
            <div class="form-group">
                <label>Judul Foto <span class="required">*</span></label>
                <input type="text" name="title" required placeholder="Contoh: Sunset di Wirotaman" />
                <div class="form-help">Buat judul yang menarik dan deskriptif</div>
            </div>
            
            <div class="form-group">
                <label>Caption/Deskripsi</label>
                <textarea name="caption" placeholder="Jelaskan momen atau keindahan yang ditangkap dalam foto ini..."></textarea>
                <div class="form-help">Deskripsikan foto untuk memberikan konteks kepada pengunjung</div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>🖼️ Upload Gambar</h4>
            
            <div class="form-group">
                <label>Pilih Gambar <span class="required">*</span></label>
                <div class="file-upload-area" onclick="document.getElementById('image-file-input').click()">
                    <input type="file" id="image-file-input" name="image_file" accept="image/*" required onchange="previewImage(this)" />
                    <div class="file-upload-text">📁 Klik untuk memilih gambar</div>
                    <div class="file-upload-hint">Format yang didukung: JPG, PNG, GIF (Max 5MB)</div>
                </div>
                <div id="image-preview" style="display:none; margin-top:1rem;">
                    <img id="preview-img" src="" alt="Preview" style="max-width:300px;border-radius:8px;"/>
                </div>
            </div>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                📤 Upload Foto
            </button>
            <a href="/admin/gallery" class="btn btn-outline">
                ← Kembali ke Gallery
            </a>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('image-preview').style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
