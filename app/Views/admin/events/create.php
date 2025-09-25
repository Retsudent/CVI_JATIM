<style>
    :root{--primary:#2e7d32;--primaryDark:#1a4f1a;--leaf:#66bb6a;--mint:#dff5e3;--wood:#2d2a26;--cloud:#eef7ef;--gray:#d9e4dd}
    html,body{background:linear-gradient(135deg,#e0f7fa,#c8e6c9)}
	.event-wrap{max-width:960px;margin:24px auto;padding:0 16px}
	.header{background:linear-gradient(135deg,var(--primaryDark),var(--primary));color:#fff;border-radius:18px;padding:22px 24px;box-shadow:0 10px 20px rgba(0,0,0,.12)}
	.header h2{margin:0;font-size:22px}
	.card{margin-top:16px;background:#fff;border:1px solid var(--gray);border-radius:18px;box-shadow:0 8px 18px rgba(0,0,0,.08);overflow:hidden}
	.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;padding:20px}
	.form-row{display:flex;flex-direction:column}
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
	@media(max-width:720px){.form-grid{grid-template-columns:1fr}}
</style>

<div class="event-wrap">
	<div class="header">
		<h2>Tambah Event</h2>
		<div style="opacity:.9">Buat event baru dengan nuansa alam</div>
	</div>

    <form class="card" method="post" action="/admin/events" enctype="multipart/form-data">
		<div class="form-grid">
			<div class="form-row">
				<label class="label">Judul</label>
				<input class="input" type="text" name="title" placeholder="cth: Camping Menyambut Ramadhan" required />
			</div>
			<div class="form-row">
				<label class="label">Lokasi</label>
				<input class="input" type="text" name="location" placeholder="cth: Telaga Ngebel, Ponorogo" required />
			</div>

			<div class="form-row" style="grid-column:1/-1">
				<label class="label">Deskripsi</label>
				<textarea class="textarea" name="description" placeholder="Gambarkan konsep, agenda, dan informasi penting event" required></textarea>
			</div>

			<div class="form-row">
				<label class="label">Tanggal Mulai</label>
				<input class="input" type="date" name="start_date" required />
			</div>
			<div class="form-row">
				<label class="label">Tanggal Selesai</label>
				<input class="input" type="date" name="end_date" required />
			</div>

			<div class="form-row">
				<label class="label">Harga (opsional)</label>
				<input class="input" type="number" step="0.01" name="price" placeholder="cth: 15000" />
			</div>
			<div class="form-row">
				<label class="label">Status</label>
				<select class="select" name="status">
					<option value="upcoming">Upcoming</option>
					<option value="ongoing">Ongoing</option>
					<option value="completed">Completed</option>
					<option value="cancelled">Cancelled</option>
				</select>
			</div>

            <div class="form-row" style="grid-column:1/-1">
                <label class="label">Upload Gambar</label>
                <div class="dropzone" id="eventDrop">
                    <div>Tarik & letakkan gambar atau klik untuk memilih</div>
                    <small class="hint">Format: JPG/PNG • Maks 2MB</small>
                    <input class="input" id="eventImage" type="file" name="image_file" accept="image/*" style="display:none" />
                </div>
                <img id="eventPreview" style="display:none;margin-top:10px;border-radius:12px;max-height:220px" alt="Preview" />
            </div>
		</div>
		<div class="actions">
			<a class="btn btn-cancel" href="/admin/events">Batal</a>
			<button class="btn btn-save" type="submit">Simpan</button>
		</div>
	</form>
</div>


<script>
const eventImage = document.getElementById('eventImage');
const eventPreview = document.getElementById('eventPreview');
const eventDrop = document.getElementById('eventDrop');
if (eventImage) {
	eventImage.addEventListener('change', (e) => {
		const [file] = e.target.files || [];
		if (!file) return;
		eventPreview.src = URL.createObjectURL(file);
		eventPreview.style.display = 'block';
	});
}
if (eventDrop) {
	eventDrop.addEventListener('click', ()=> eventImage.click());
	eventDrop.addEventListener('dragover', (e)=>{e.preventDefault();eventDrop.classList.add('dragover');});
	eventDrop.addEventListener('dragleave', ()=> eventDrop.classList.remove('dragover'));
	eventDrop.addEventListener('drop', (e)=>{e.preventDefault();eventDrop.classList.remove('dragover');if(e.dataTransfer.files.length){eventImage.files=e.dataTransfer.files;eventImage.dispatchEvent(new Event('change'));}});
}
</script>
</script>
