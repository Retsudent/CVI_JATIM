<style>
    :root{--primary:#2e7d32;--primaryDark:#1a4f1a;--leaf:#66bb6a;--mint:#dff5e3;--wood:#2d2a26;--cloud:#eef7ef;--gray:#d9e4dd}
    html,body{background:linear-gradient(135deg,#e0f7fa,#c8e6c9)}
	.wrap{max-width:800px;margin:24px auto;padding:0 16px}
	.header{background:linear-gradient(135deg,var(--primaryDark),var(--primary));color:#fff;border-radius:18px;padding:22px 24px;box-shadow:0 10px 20px rgba(0,0,0,.12)}
	.header h2{margin:0;font-size:22px}
	.card{margin-top:16px;background:#fff;border:1px solid var(--gray);border-radius:18px;box-shadow:0 8px 18px rgba(0,0,0,.08);overflow:hidden}
	.body{padding:20px;display:grid;gap:16px}
    .label{font-weight:800;color:var(--wood);margin-bottom:6px;letter-spacing:.3px}
	.input,.textarea,.file{padding:12px 14px;border:1px solid #cfd8dc;border-radius:12px;background:#fff}
	.textarea{min-height:110px;resize:vertical}
	.alert{padding:12px 14px;border-radius:10px;margin-top:12px}
	.alert-error{background:#fdecea;color:#b71c1c}
	.alert-success{background:#e8f5e9;color:#1b5e20}
	.preview{display:none;margin-top:10px;border-radius:12px;max-height:220px}
	.actions{display:flex;gap:10px;padding:16px 20px;background:var(--cloud);justify-content:flex-end;border-top:1px solid var(--gray)}
    .btn{border:0;border-radius:10px;padding:12px 18px;font-weight:800;cursor:pointer}
	.btn-cancel{background:#eceff1;color:#37474f}
    .btn-save{background:linear-gradient(135deg,#1b5e20,#2e7d32);color:#fff;box-shadow:0 8px 18px rgba(46,125,50,.25)}
    .btn-save:hover{filter:brightness(1.08);transform:translateY(-1px)}
    .input:focus,.textarea:focus{outline:3px solid rgba(102,187,106,.25);border-color:#9ccc65}
    .dropzone{border:2px dashed #8bc34a;border-radius:14px;padding:18px;text-align:center;background:linear-gradient(135deg,#f3fff4,#e7ffee);color:#2e7d32;transition:.2s}
    .dropzone .hint{display:block;color:#558b2f;opacity:.9;margin-top:4px}
    .dropzone.dragover{background:linear-gradient(135deg,#e0ffe3,#d0ffd6);border-color:#2e7d32;box-shadow:0 8px 18px rgba(46,125,50,.18)}
</style>

<div class="wrap">
	<div class="header">
		<h2>Upload Foto Baru</h2>
		<div style="opacity:.9">Tambahkan momen terbaik bertema alam</div>
	</div>

	<?php if (!empty($error)): ?>
		<div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
	<?php endif; ?>
	<?php if (!empty($success)): ?>
		<div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
	<?php endif; ?>

	<form class="card" method="post" action="/admin/gallery" enctype="multipart/form-data">
		<div class="body">
			<div>
				<label class="label">Judul</label>
				<input class="input" type="text" name="title" placeholder="cth: Camping di Telaga Ngebel" />
			</div>
			<div>
				<label class="label">Caption</label>
				<textarea class="textarea" name="caption" placeholder="Cerita singkat tentang foto"></textarea>
			</div>
            <div>
                <label class="label">Pilih Gambar</label>
                <div class="dropzone" id="galleryDrop">
                    <div>Tarik & letakkan gambar atau klik untuk memilih</div>
                    <small class="hint">Format: JPG/PNG • Maks 2MB</small>
                    <input class="file" id="fileInput" type="file" name="image_file" accept="image/*" required style="display:none" />
                </div>
                <img id="previewImg" class="preview" alt="Preview" />
            </div>
		</div>
		<div class="actions">
			<a class="btn btn-cancel" href="/admin/gallery">Batal</a>
			<button class="btn btn-save" type="submit">Simpan</button>
		</div>
	</form>
</div>

<script>
const fileInput = document.getElementById('fileInput');
const previewImg = document.getElementById('previewImg');
const galleryDrop = document.getElementById('galleryDrop');
if (fileInput) {
	fileInput.addEventListener('change', (e) => {
		const [file] = e.target.files || [];
		if (!file) return;
		previewImg.src = URL.createObjectURL(file);
		previewImg.style.display = 'block';
	});
}
if (galleryDrop) {
	galleryDrop.addEventListener('click', ()=> fileInput.click());
	galleryDrop.addEventListener('dragover', (e)=>{e.preventDefault();galleryDrop.classList.add('dragover');});
	galleryDrop.addEventListener('dragleave', ()=> galleryDrop.classList.remove('dragover'));
	galleryDrop.addEventListener('drop', (e)=>{e.preventDefault();galleryDrop.classList.remove('dragover');if(e.dataTransfer.files.length){fileInput.files=e.dataTransfer.files;fileInput.dispatchEvent(new Event('change'));}});
}
</script>