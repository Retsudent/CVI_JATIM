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
                <div class="file-upload-area" id="gallery-upload-area" onclick="document.getElementById('image-file-input').click()">
                    <input type="file" id="image-file-input" name="image_file" accept="image/*" required onchange="previewImage(this)" />
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--gray-400); margin-bottom: 12px;">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="17 8 12 3 7 8"></polyline>
                        <line x1="12" y1="3" x2="12" y2="15"></line>
                    </svg>
                    <div class="file-upload-text">Klik atau seret gambar ke sini untuk upload</div>
                    <div class="file-upload-hint">Format yang didukung: JPG, PNG, GIF (Max 5MB)</div>
                </div>
                <div id="image-preview">
                    <img id="preview-img" src="" alt="Preview" />
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
            const preview = document.getElementById('image-preview');
            const img = document.getElementById('preview-img');
            img.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Drag and Drop functionality
const uploadArea = document.getElementById('gallery-upload-area');
const fileInput = document.getElementById('image-file-input');

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
            previewImage(fileInput);
        }
    }, false);
}
</script>
