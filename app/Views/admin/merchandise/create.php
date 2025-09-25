<style>
    :root { --primary-green:#2e7d32; --dark-green:#1b5e20; --light-green:#66bb6a; --mint:#e8f5e9; --sage:#a5d6a7; --gray-50:#fafafa; --gray-100:#f5f5f5; --gray-200:#eeeeee; --gray-700:#616161; --shadow-md:0 4px 6px rgba(0,0,0,.08); --shadow-lg:0 10px 20px rgba(0,0,0,.08); }
    .page-wrap{max-width:1100px;margin:0 auto;padding:clamp(16px,3.2vw,24px) 16px}
    .header{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px}
    .title{font-weight:800;color:var(--dark-green);font-size:clamp(20px,3vw,28px);display:flex;align-items:center;gap:10px}
    .badge{background:linear-gradient(135deg,var(--light-green),var(--sage));color:#fff;padding:6px 10px;border-radius:10px;font-size:12px;font-weight:700}
    .back-link{color:var(--dark-green);text-decoration:none;border:1px solid rgba(46,125,50,.25);padding:8px 12px;border-radius:10px;background:rgba(255,255,255,.7);box-shadow:var(--shadow-md)}
    .back-link:hover{background:var(--mint)}
    .card{background:rgba(255,255,255,.96);backdrop-filter:blur(16px);border-radius:16px;box-shadow:var(--shadow-lg);overflow:hidden}
    .card-head{padding:18px 20px;background:linear-gradient(135deg,var(--dark-green),var(--primary-green));color:#fff}
    .card-body{padding:clamp(16px,3vw,22px)}
    .grid{display:grid;grid-template-columns:repeat(12,1fr);gap:16px}
    .col-12{grid-column:span 12}.col-6{grid-column:span 6}.col-4{grid-column:span 4}
    @media (max-width: 992px){.col-6,.col-4{grid-column:span 12}}
    .form-group{display:flex;flex-direction:column;gap:8px}
    .label{font-weight:600;color:var(--gray-700);font-size:14px}
    .input,.select,.textarea{width:100%;border:1px solid var(--gray-200);background:var(--gray-50);border-radius:12px;padding:12px 14px;font-size:14px;outline:none;transition:border-color .2s ease,box-shadow .2s ease,background .2s ease}
    .textarea{min-height:110px;resize:vertical}
    .input:focus,.select:focus,.textarea:focus{border-color:var(--light-green);background:#fff;box-shadow:0 0 0 4px rgba(102,187,106,.15)}
    .actions{display:flex;gap:10px;justify-content:flex-end;margin-top:10px}
    .btn{border:1px solid transparent;border-radius:12px;padding:10px 16px;font-weight:700;cursor:pointer}
    .btn-secondary{background:#fff;border-color:var(--gray-200);color:#374151}
    .btn-secondary:hover{background:var(--gray-100)}
    .btn-primary{background:linear-gradient(135deg,var(--primary-green),var(--light-green));color:#fff}
    .btn-primary:hover{filter:brightness(1.03)}
    .input-row{display:flex;gap:10px;align-items:center}
    .prefix{background:var(--gray-100);border:1px solid var(--gray-200);padding:10px 12px;border-radius:10px;font-weight:700;color:#374151}
    @media (max-width:576px){.actions{flex-direction:column;align-items:stretch}.btn{width:100%}}
    .price-hint{font-size:12px;color:#6b7280}
</style>

<div class="page-wrap">
    <div class="header">
        <div class="title">🛍️ Tambah Merchandise <span class="badge">Baru</span></div>
        <a class="back-link" href="<?= base_url('admin/merchandise') ?>">← Kembali</a>
    </div>

    <div class="card">
        <div class="card-head">Formulir Merchandise</div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/merchandise') ?>" enctype="multipart/form-data">
                <div class="grid">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">Nama Produk</label>
                            <input class="input" type="text" name="name" placeholder="Contoh: Kaos CVI Edisi Gunung" required />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">Kategori</label>
                            <input class="input" type="text" name="category" placeholder="Contoh: Apparel, Aksesoris" required />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="label">Deskripsi</label>
                            <textarea class="textarea" name="description" placeholder="Bahan, ukuran, warna, dan informasi penting lainnya" required></textarea>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">Harga</label>
                            <div class="input-row">
                                <span class="prefix">Rp</span>
                                <input class="input" type="number" step="0.01" name="price" placeholder="0" required />
                            </div>
                            <div class="price-hint">Harga jual satuan.</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">Stok</label>
                            <input class="input" type="number" name="stock" value="0" />
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">Status</label>
                            <select class="select" name="status">
                                <option value="available">Tersedia</option>
                                <option value="out_of_stock">Habis</option>
                                <option value="discontinued">Berhenti</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="label">Gambar Produk</label>
                            <div class="grid" style="grid-template-columns: repeat(12, 1fr); gap: 12px;">
                                <div class="col-6">
                                    <div class="form-group">
                                        <span class="label">Upload File</span>
                                        <input class="input" type="file" name="image_file" accept="image/*" id="m_image_file" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <span class="label">Atau URL Gambar</span>
                                        <input class="input" type="text" name="image" placeholder="https://... atau assets/images/namafile.jpg" id="m_image_url" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <img id="m_image_preview" alt="Preview" style="display:none; max-width:100%; border-radius:12px; box-shadow: var(--shadow-md);" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <a class="btn btn-secondary" href="<?= base_url('admin/merchandise') ?>">Batal</a>
                    <button class="btn btn-primary" type="submit">Simpan Merchandise</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
(function(){
    var price = document.querySelector('input[name="price"]');
    if (price){ price.addEventListener('input', function(){ if (this.value < 0) this.value = 0; }); }
    var file = document.getElementById('m_image_file');
    var url = document.getElementById('m_image_url');
    var preview = document.getElementById('m_image_preview');
    function showPreview(src){ if(!preview) return; if(!src){ preview.style.display='none'; return; } preview.src = src; preview.onload=function(){ preview.style.display='block'; }; }
    if (file){ file.addEventListener('change', function(){ if (this.files && this.files[0]){ var r=new FileReader(); r.onload=function(e){ showPreview(e.target.result); }; r.readAsDataURL(this.files[0]); } }); }
    if (url){ url.addEventListener('input', function(){ showPreview(this.value); }); }
})();
</script>
