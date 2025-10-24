<link rel="stylesheet" href="<?= base_url('assets/css/admin-forms.css') ?>">

<div class="admin-form-container">
    <div class="admin-form-header">
        <h2>🏕️ Tambah Campground Baru</h2>
        <p class="subtitle">Tambahkan area camping baru untuk pengunjung</p>
    </div>
    
    <form method="post" action="/admin/campground" enctype="multipart/form-data">
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
                    <label>Nama Campground <span class="required">*</span></label>
                    <input type="text" name="name" required placeholder="Contoh: Wirotaman Premium Campground" />
                    <div class="form-help">Buat nama yang menarik dan mudah diingat</div>
        </div>
                
                <div class="form-group">
                    <label>Deskripsi <span class="required">*</span></label>
                    <textarea name="description" required placeholder="Jelaskan keunggulan campground, pemandangan, dan pengalaman yang akan didapat pengunjung..."></textarea>
                    <div class="form-help">Deskripsikan campground secara detail untuk menarik pengunjung</div>
        </div>
                
                <div class="form-group">
                    <label>Lokasi <span class="required">*</span></label>
                    <input type="text" name="location" required placeholder="Contoh: Desa Wirotaman, Malang" />
        </div>
        </div>
            
            <div class="form-section">
                <h4>💰 Harga & Status</h4>
                
                <div class="form-group">
                    <label>Harga per Orang <span class="required">*</span></label>
                    <input type="number" step="0.01" name="price_per_person" required placeholder="25000" />
                    <div class="form-help">Harga camping per orang per hari</div>
        </div>
                
                <div class="form-group">
                    <label>Status Campground</label>
            <select name="status">
                        <option value="active">✅ Active - Campground aktif</option>
                        <option value="inactive">❌ Inactive - Campground tidak aktif</option>
                        <option value="maintenance">🔧 Maintenance - Sedang perbaikan</option>
            </select>
        </div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>🏠 Kapasitas & Fasilitas</h4>
            
            <div class="form-grid">
                <div class="form-group">
                    <label>Kapasitas Tenda</label>
                    <input type="number" name="capacity_tent" min="0" placeholder="50" />
                    <div class="form-help">Jumlah maksimal tenda yang bisa dipasang</div>
                </div>
                
                <div class="form-group">
                    <label>Kapasitas Orang</label>
                    <input type="number" name="capacity_people" min="0" placeholder="150" />
                    <div class="form-help">Jumlah maksimal pengunjung</div>
                </div>
                
                <div class="form-group">
                    <label>Kapasitas Parkir</label>
                    <input type="number" name="capacity_parking" min="0" placeholder="30" />
                    <div class="form-help">Jumlah maksimal kendaraan</div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Fasilitas Tersedia</label>
                <textarea name="facilities" placeholder="Contoh:&#10;Toilet dan MCK bersih&#10;Air bersih 24 jam&#10;Area parkir luas&#10;Warung makanan&#10;Peralatan camping sewa&#10;Area bonfire&#10;WiFi gratis"></textarea>
                <div class="form-help">Satu fasilitas per baris</div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>📍 Alamat & Koordinat</h4>
            
            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea name="address" placeholder="Contoh: Jl. Wirotaman No. 123, Desa Wirotaman, Kecamatan Malang, Jawa Timur 65100"></textarea>
                <div class="form-help">Alamat lengkap untuk navigasi</div>
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label>Latitude</label>
                    <input type="text" name="coordinates_lat" placeholder="-7.9775" />
                    <div class="form-help">Koordinat lintang (dapat dari Google Maps)</div>
                </div>
                
                <div class="form-group">
                    <label>Longitude</label>
                    <input type="text" name="coordinates_lng" placeholder="112.6340" />
                    <div class="form-help">Koordinat bujur (dapat dari Google Maps)</div>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h4>📞 Kontak & Media</h4>
            
            <div class="form-group">
                <label>Informasi Kontak</label>
                <textarea name="contact_info" placeholder="Contoh:&#10;WhatsApp: 6281234567890&#10;Telepon: (0341) 123456&#10;Email: info@wirotaman.com&#10;Jam Operasional: 24 Jam"></textarea>
                <div class="form-help">Informasi kontak lengkap</div>
            </div>
            
            <div class="form-group">
                <label>Gambar Campground</label>
                <div class="file-upload-area" onclick="document.getElementById('camp-image-file-input').click()">
                    <input type="file" id="camp-image-file-input" name="image_file" accept="image/*" onchange="previewCampImage(this)" />
                    <div class="file-upload-text">📁 Klik untuk memilih gambar dari komputer</div>
                    <div class="file-upload-hint">Format: JPG, PNG, WEBP. Max ukuran sesuai konfigurasi server.</div>
                </div>
                <div id="camp-image-preview" style="display:none; margin-top:1rem;">
                    <img id="camp-preview-img" src="" alt="Preview" style="max-width:300px;border-radius:8px;"/>
                </div>
                <div class="form-help">Atau masukkan nama file/URL pada field gambar setelah upload (tetap didukung)</div>
                <input type="text" name="image" placeholder="(opsional) nama-file.jpg atau URL gambar" style="margin-top:.5rem;" />
            </div>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                💾 Simpan Campground
            </button>
            <a href="/admin/campground" class="btn btn-outline">
                ← Kembali ke Daftar Campground
            </a>
        </div>
    </form>
</div>
<script>
function previewCampImage(input) {
    var file = input.files && input.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function(e) {
        var p = document.getElementById('camp-image-preview');
        var img = document.getElementById('camp-preview-img');
        img.src = e.target.result;
        p.style.display = 'block';
    };
    reader.readAsDataURL(file);
}
</script>


