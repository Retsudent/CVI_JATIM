<link rel="stylesheet" href="<?= base_url('assets/css/admin-forms.css') ?>">

<div class="admin-form-container">
    <div class="admin-form-header">
        <h2>📸 Detail Foto Gallery</h2>
        <p class="subtitle">Lihat detail dan kelola foto gallery</p>
    </div>
    
    <div class="form-section">
        <h4>🖼️ Preview Foto</h4>
        <div class="image-preview" style="text-align: center; padding: 2rem;">
            <img src="<?= base_url('assets/images/' . basename($photo['image'])) ?>" alt="<?= htmlspecialchars($photo['title'] ?? '') ?>" style="max-width: 100%; max-height: 500px; object-fit: contain; border-radius: 12px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);" />
        </div>
    </div>
    
    <div class="form-section">
        <h4>📝 Informasi Foto</h4>
        
        <div class="form-group">
            <label>Judul Foto</label>
            <div style="padding: 0.75rem 1rem; background: #f8f9fa; border: 2px solid #e9ecef; border-radius: 8px; font-size: 1.1rem; font-weight: 600; color: #2c3e50;">
                <?= htmlspecialchars($photo['title'] ?? 'Tidak ada judul') ?>
            </div>
        </div>
        
        <div class="form-group">
            <label>Caption/Deskripsi</label>
            <div style="padding: 0.75rem 1rem; background: #f8f9fa; border: 2px solid #e9ecef; border-radius: 8px; min-height: 100px; white-space: pre-line; color: #495057;">
                <?= htmlspecialchars($photo['caption'] ?? 'Tidak ada deskripsi') ?>
            </div>
        </div>
        
        <div class="form-grid">
            <div class="form-group">
                <label>Tanggal Upload</label>
                <div style="padding: 0.75rem 1rem; background: #f8f9fa; border: 2px solid #e9ecef; border-radius: 8px; color: #6c757d;">
                    <?= date('d F Y H:i', strtotime($photo['created_at'] ?? 'now')) ?>
                </div>
            </div>
            
            <div class="form-group">
                <label>Ukuran File</label>
                <div style="padding: 0.75rem 1rem; background: #f8f9fa; border: 2px solid #e9ecef; border-radius: 8px; color: #6c757d;">
                    <?php 
                    $filePath = ROOTPATH . 'public/assets/images/' . basename($photo['image']);
                    if (file_exists($filePath)) {
                        echo number_format(filesize($filePath) / 1024, 1) . ' KB';
                    } else {
                        echo 'File tidak ditemukan';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="form-actions">
        <a href="/admin/gallery/edit/<?= (int)$photo['id'] ?>" class="btn btn-primary">
            ✏️ Edit Foto
        </a>
        <form method="post" action="/admin/gallery/delete/<?= (int)$photo['id'] ?>" onsubmit="return confirm('Yakin ingin menghapus foto ini? Tindakan ini tidak dapat dibatalkan.');" style="display: inline;">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-danger">
                🗑️ Hapus Foto
            </button>
        </form>
        <a href="/admin/gallery" class="btn btn-outline">
            ← Kembali ke Gallery
        </a>
    </div>
</div>



