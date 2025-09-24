<div class="container py-4">
    <h2>Tambah Foto Galeri</h2>
    <?php if (!empty($error)): ?>
        <div style="background:#fdecea;color:#b71c1c;padding:10px;border-radius:6px;margin:10px 0;">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <div style="background:#e8f5e9;color:#1b5e20;padding:10px;border-radius:6px;margin:10px 0;">
            <?= htmlspecialchars($success) ?>
        </div>
    <?php endif; ?>
    <form method="post" action="/admin/gallery" enctype="multipart/form-data">
        <div>
            <label>Judul</label>
            <input type="text" name="title" />
        </div>
        <div>
            <label>Caption</label>
            <textarea name="caption"></textarea>
        </div>
        <div>
            <label>Pilih Gambar</label>
            <input type="file" name="image_file" accept="image/*" required />
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>