<link rel="stylesheet" href="<?= base_url('assets/css/admin-forms.css') ?>">

<div class="admin-form-container">
    <div class="admin-form-header">
        <h2>✏️ Edit Event</h2>
        <p class="subtitle">Update informasi event yang sudah ada</p>
    </div>
    
    <form method="post" action="/admin/events/edit/<?= htmlspecialchars($event['id']) ?>" enctype="multipart/form-data">
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
                <h4>📝 Informasi Dasar</h4>
                
                <div class="form-group">
                    <label>Judul Event <span class="required">*</span></label>
                    <input type="text" name="title" value="<?= htmlspecialchars($event['title']) ?>" required placeholder="Contoh: Camping Adventure di Wirotaman" />
                    <div class="form-help">Buat judul yang menarik dan mudah diingat</div>
                </div>
                
                <div class="form-group">
                    <label>Deskripsi <span class="required">*</span></label>
                    <textarea name="description" required placeholder="Jelaskan detail event, kegiatan yang akan dilakukan, dan manfaat yang akan didapat peserta..."><?= htmlspecialchars($event['description']) ?></textarea>
                    <div class="form-help">Deskripsikan event secara detail untuk menarik peserta</div>
                </div>
                
                <div class="form-group">
                    <label>Lokasi <span class="required">*</span></label>
                    <input type="text" name="location" value="<?= htmlspecialchars($event['location']) ?>" required placeholder="Contoh: Wirotaman Campground, Malang" />
                </div>
            </div>
            
            <div class="form-section">
                <h4>📅 Waktu & Tempat</h4>
                
                <div class="form-group">
                    <label>Tanggal Mulai <span class="required">*</span></label>
                    <input type="date" name="start_date" value="<?= htmlspecialchars($event['start_date']) ?>" required />
                </div>
                
                <div class="form-group">
                    <label>Tanggal Selesai <span class="required">*</span></label>
                    <input type="date" name="end_date" value="<?= htmlspecialchars($event['end_date']) ?>" required />
                </div>
                
                <div class="form-group">
                    <label>Kapasitas Peserta</label>
                    <input type="number" name="capacity" min="1" value="<?= htmlspecialchars($event['capacity']) ?>" placeholder="50" />
                    <div class="form-help">Jumlah maksimal peserta yang bisa mengikuti event</div>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>💰 Harga & Status</h4>
            
            <div class="form-group">
                <label>Harga (Rp)</label>
                <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($event['price']) ?>" placeholder="150000" />
                <div class="form-help">Kosongkan jika event gratis</div>
            </div>
            
            <div class="form-group">
                <label>Status Event</label>
                <select name="status">
                    <option value="upcoming" <?= $event['status']==='upcoming'?'selected':'' ?>>⏳ Upcoming - Event akan datang</option>
                    <option value="ongoing" <?= $event['status']==='ongoing'?'selected':'' ?>>🟢 Ongoing - Event sedang berlangsung</option>
                    <option value="completed" <?= $event['status']==='completed'?'selected':'' ?>>✅ Completed - Event selesai</option>
                    <option value="cancelled" <?= $event['status']==='cancelled'?'selected':'' ?>>❌ Cancelled - Event dibatalkan</option>
                </select>
            </div>
        </div>
        
        <div class="form-section">
            <h4>📞 Kontak & Media</h4>
            
            <div class="form-group">
                <label>Gambar Event</label>
                <div class="file-upload-area" onclick="document.getElementById('image-file-input').click()">
                    <input type="file" id="image-file-input" name="image_file" accept="image/*" onchange="previewImage(this)" />
                    <div class="file-upload-text">📁 Klik untuk memilih gambar dari komputer</div>
                    <div class="file-upload-hint">Format: JPG, PNG, WEBP. Max ukuran sesuai konfigurasi server.</div>
                </div>
                <?php if (!empty($event['image'])): ?>
                <div style="margin-top:0.75rem;">Saat ini: <a href="<?= htmlspecialchars($event['image']) ?>" target="_blank">Lihat gambar</a></div>
                <?php endif; ?>
                <div id="image-preview" style="display:none; margin-top:1rem;">
                    <img id="preview-img" src="" alt="Preview" style="max-width:300px;border-radius:8px;"/>
                </div>
            </div>
            
            <div class="form-group">
                <label>WhatsApp Contact</label>
                <input type="text" name="whatsapp_contact" value="<?= htmlspecialchars($event['whatsapp_contact']) ?>" placeholder="6281234567890" />
                <div class="form-help">Nomor WhatsApp untuk informasi lebih lanjut</div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>🎯 Aktivitas & Fasilitas</h4>
            
            <div class="form-group">
                <label>Aktivitas yang Akan Dilakukan</label>
                <textarea name="activities" placeholder="Contoh:&#10;Camping malam di tepi danau&#10;Stargazing dan storytelling&#10;Hiking ke puncak gunung&#10;Workshop survival skills"><?= htmlspecialchars($event['activities']) ?></textarea>
                <div class="form-help">Satu aktivitas per baris</div>
            </div>
            
            <div class="form-group">
                <label>Fasilitas yang Disediakan</label>
                <textarea name="facilities" placeholder="Contoh:&#10;Tenda camping (2-3 orang)&#10;Makan 3x (dinner, breakfast, lunch)&#10;Peralatan camping lengkap&#10;Pemandu berpengalaman"><?= htmlspecialchars($event['facilities']) ?></textarea>
                <div class="form-help">Satu fasilitas per baris</div>
            </div>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                💾 Update Event
            </button>
            <a href="/admin/events" class="btn btn-outline">
                ← Kembali ke Daftar Event
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
</script>


