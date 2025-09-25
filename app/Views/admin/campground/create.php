<style>
    :root{--primary:#2e7d32;--primaryDark:#1a4f1a;--leaf:#66bb6a;--mint:#dff5e3;--wood:#2d2a26;--cloud:#eef7ef;--gray:#d9e4dd}
    html,body{background:linear-gradient(135deg,#e0f7fa,#c8e6c9)}
	.wrap{max-width:960px;margin:24px auto;padding:0 16px}
	.header{background:linear-gradient(135deg,var(--primaryDark),var(--primary));color:#fff;border-radius:18px;padding:22px 24px;box-shadow:0 10px 20px rgba(0,0,0,.12)}
	.header h2{margin:0;font-size:22px}
	.card{margin-top:16px;background:#fff;border:1px solid var(--gray);border-radius:18px;box-shadow:0 8px 18px rgba(0,0,0,.08);overflow:hidden}
	.grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;padding:20px}
	.row{display:flex;flex-direction:column}
    .label{font-weight:800;color:var(--wood);margin-bottom:6px;letter-spacing:.3px}
	.input,.select,.textarea{padding:12px 14px;border:1px solid #cfd8dc;border-radius:12px;background:#fff}
	.textarea{min-height:120px;resize:vertical}
	.actions{display:flex;gap:10px;padding:16px 20px;background:var(--cloud);justify-content:flex-end;border-top:1px solid var(--gray)}
    .btn{border:0;border-radius:10px;padding:12px 18px;font-weight:800;cursor:pointer}
	.btn-cancel{background:#eceff1;color:#37474f}
    .btn-save{background:linear-gradient(135deg,#1b5e20,#2e7d32);color:#fff;box-shadow:0 8px 18px rgba(46,125,50,.25)}
    .btn-save:hover{filter:brightness(1.08);transform:translateY(-1px)}
    .input:focus,.select:focus,.textarea:focus{outline:3px solid rgba(102,187,106,.25);border-color:#9ccc65}
    .dropzone{border:2px dashed #8bc34a;border-radius:14px;padding:18px;text-align:center;background:linear-gradient(135deg,#f3fff4,#e7ffee);color:#2e7d32;transition:.2s}
    .dropzone .hint{display:block;color:#558b2f;opacity:.9;margin-top:4px}
    .dropzone.dragover{background:linear-gradient(135deg,#e0ffe3,#d0ffd6);border-color:#2e7d32;box-shadow:0 8px 18px rgba(46,125,50,.18)}
	@media(max-width:720px){.grid{grid-template-columns:1fr}}
</style>

<div class="wrap">
	<div class="header">
		<h2>Tambah Campground</h2>
		<div style="opacity:.9">Tambah lokasi camping bertema alam</div>
	</div>

    <form class="card" method="post" action="/admin/campground" enctype="multipart/form-data">
		<div class="grid">
			<div class="row">
				<label class="label">Nama</label>
				<input class="input" type="text" name="name" placeholder="cth: Telaga Ngebel" required />
			</div>
			<div class="row">
				<label class="label">Lokasi</label>
				<input class="input" type="text" name="location" placeholder="cth: Ngebel, Ponorogo" required />
			</div>

			<div class="row" style="grid-column:1/-1">
				<label class="label">Deskripsi</label>
				<textarea class="textarea" name="description" placeholder="Deskripsi singkat campground" required></textarea>
			</div>

			<div class="row">
				<label class="label">Harga per Orang</label>
				<input class="input" type="number" step="0.01" name="price_per_person" placeholder="cth: 15000" required />
			</div>
			<div class="row">
				<label class="label">Status</label>
				<select class="select" name="status">
					<option value="active">Active</option>
					<option value="inactive">Inactive</option>
					<option value="maintenance">Maintenance</option>
				</select>
			</div>

			<div class="row" style="grid-column:1/-1">
				<label class="label">Fasilitas</label>
				<textarea class="textarea" name="facilities" placeholder="Pisahkan dengan koma, cth: Toilet, Parkir, Warung"></textarea>
			</div>
			<div class="row" style="grid-column:1/-1">
				<label class="label">Kontak</label>
				<textarea class="textarea" name="contact_info" placeholder="cth: WhatsApp: 08xxxx"></textarea>
			</div>

            <div class="row" style="grid-column:1/-1">
                <label class="label">Upload Gambar</label>
                <div class="dropzone" id="campDrop">
                    <div>Tarik & letakkan gambar atau klik untuk memilih</div>
                    <small class="hint">Format: JPG/PNG • Maks 2MB</small>
                    <input class="input" id="campImage" type="file" name="image_file" accept="image/*" style="display:none" />
                </div>
                <img id="campPreview" style="display:none;margin-top:10px;border-radius:12px;max-height:220px" alt="Preview" />
            </div>
		</div>
		<div class="actions">
			<a class="btn btn-cancel" href="/admin/campground">Batal</a>
			<button class="btn btn-save" type="submit">Simpan</button>
		</div>
	</form>
</div>


<script>
const campImage = document.getElementById('campImage');
const campPreview = document.getElementById('campPreview');
const campDrop = document.getElementById('campDrop');
if (campImage) {
	campImage.addEventListener('change', (e) => {
		const [file] = e.target.files || [];
		if (!file) return;
		campPreview.src = URL.createObjectURL(file);
		campPreview.style.display = 'block';
	});
}
if (campDrop) {
	campDrop.addEventListener('click', ()=> campImage.click());
	campDrop.addEventListener('dragover', (e)=>{e.preventDefault();campDrop.classList.add('dragover');});
	campDrop.addEventListener('dragleave', ()=> campDrop.classList.remove('dragover'));
	campDrop.addEventListener('drop', (e)=>{e.preventDefault();campDrop.classList.remove('dragover');if(e.dataTransfer.files.length){campImage.files=e.dataTransfer.files;campImage.dispatchEvent(new Event('change'));}});
}
</script>
