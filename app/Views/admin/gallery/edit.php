<link rel="stylesheet" href="<?= base_url('assets/css/admin-forms.css') ?>">

<div class="admin-form-container">
    <div class="admin-form-header">
        <h2>📸 Edit Foto Gallery</h2>
        <p class="subtitle">Update informasi foto gallery yang sudah ada</p>
    </div>
    
    <form method="post" action="/admin/gallery/edit/<?= htmlspecialchars($photo['id']) ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="form-section">
            <h4>📝 Informasi Foto</h4>
            
            <div class="form-group">
                <label>Judul Foto <span class="required">*</span></label>
                <input type="text" name="title" value="<?= htmlspecialchars($photo['title']) ?>" required placeholder="Contoh: Sunset di Wirotaman" />
                <div class="form-help">Buat judul yang menarik dan deskriptif</div>
            </div>
            
            <div class="form-group">
                <label>Caption/Deskripsi</label>
                <textarea name="caption" placeholder="Jelaskan momen atau keindahan yang ditangkap dalam foto ini..."><?= htmlspecialchars($photo['caption']) ?></textarea>
                <div class="form-help">Deskripsikan foto untuk memberikan konteks kepada pengunjung</div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>🖼️ Gambar</h4>
            
            <div class="form-group">
                <label>Gambar Saat Ini</label>
                <div class="image-preview">
                    <img src="<?= base_url('assets/images/' . basename($photo['image'])) ?>" alt="Gambar saat ini" />
                </div>
            </div>
            
            <div class="form-group">
                <label>Ganti Gambar (opsional)</label>
                <div class="file-upload-area" onclick="document.getElementById('image-file-input').click()">
                    <input type="file" id="image-file-input" name="image_file" accept="image/*" onchange="previewImage(this)" />
                    <div class="file-upload-text">📁 Klik untuk memilih gambar baru</div>
                    <div class="file-upload-hint">Format yang didukung: JPG, PNG, GIF (Max 5MB)</div>
                </div>
                <div id="image-preview-new" style="display:none; margin-top:1rem;">
                    <img id="preview-img" src="" alt="Preview" style="max-width:200px;border-radius:8px;"/>
                </div>
            </div>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                💾 Simpan Perubahan
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
            document.getElementById('image-preview-new').style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>



