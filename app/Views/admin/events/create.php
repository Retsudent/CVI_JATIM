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
</style>

<div class="page-wrap">
    <div class="header">
        <div class="title">🎉 Tambah Event <span class="badge">Baru</span></div>
        <a class="back-link" href="<?= base_url('admin/events') ?>">← Kembali</a>
    </div>

    <div class="card">
        <div class="card-head">Formulir Event</div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/events') ?>" enctype="multipart/form-data">
                <div class="grid">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">Judul</label>
                            <input class="input" type="text" name="title" placeholder="Contoh: Camp Ceria di Lembah Hijau" required />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="label">Lokasi</label>
                            <div class="input-row" style="flex-wrap: wrap; gap:8px;">
                                <input class="input" type="text" name="location" id="e_location" placeholder="Cari atau pilih di peta" style="flex:1 1 260px;" required />
                                <button class="btn btn-secondary" type="button" id="btnSearchAddress">Cari</button>
                                <a class="btn btn-secondary" target="_blank" id="btnOpenGmaps" href="#">Buka di Google Maps</a>
                            </div>
                            <div class="grid" style="grid-template-columns: repeat(12, 1fr); gap:12px; margin-top:10px;">
                                <div class="col-12">
                                    <div id="mapPicker" style="height: 220px; width: 100%; border-radius:12px; overflow:hidden; box-shadow: var(--shadow-md);"></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="label">Latitude</label>
                                        <input class="input" type="text" name="latitude" id="e_lat" placeholder="-7.12345" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="label">Longitude</label>
                                        <input class="input" type="text" name="longitude" id="e_lng" placeholder="111.12345" />
                                    </div>
                                </div>
                            </div>
                            <div class="hint">Klik di peta untuk memilih titik. Link Google Maps otomatis mengikuti koordinat.</div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="label">Deskripsi</label>
                            <textarea class="textarea" name="description" placeholder="Ringkasan kegiatan, rundown, dan info penting" required></textarea>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="label">Tanggal Mulai</label>
                            <input class="input" type="date" name="start_date" required />
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="label">Tanggal Selesai</label>
                            <input class="input" type="date" name="end_date" required />
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="label">Harga</label>
                            <div class="input-row">
                                <span class="prefix">Rp</span>
                                <input class="input" type="number" step="0.01" name="price" placeholder="0" />
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">Status</label>
                            <select class="select" name="status">
                                <option value="upcoming">Akan Datang</option>
                                <option value="ongoing">Berlangsung</option>
                                <option value="completed">Selesai</option>
                                <option value="cancelled">Dibatalkan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="label">Poster / Gambar Event</label>
                            <div class="grid" style="grid-template-columns: repeat(12, 1fr); gap: 12px;">
                                <div class="col-6">
                                    <div class="form-group">
                                        <span class="label">Upload File</span>
                                        <input class="input" type="file" name="image_file" accept="image/*" id="e_image_file" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <span class="label">Atau URL Gambar</span>
                                        <input class="input" type="text" name="image" placeholder="https://... atau assets/images/poster.jpg" id="e_image_url" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <img id="e_image_preview" alt="Preview" style="display:none; max-width:100%; border-radius:12px; box-shadow: var(--shadow-md);" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <a class="btn btn-secondary" href="<?= base_url('admin/events') ?>">Batal</a>
                    <button class="btn btn-primary" type="submit">Simpan Event</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
(function(){
    var price = document.querySelector('input[name="price"]');
    if (price){ price.addEventListener('input', function(){ if (this.value < 0) this.value = 0; }); }
    var file = document.getElementById('e_image_file');
    var url = document.getElementById('e_image_url');
    var preview = document.getElementById('e_image_preview');
    function showPreview(src){ if(!preview) return; if(!src){ preview.style.display='none'; return; } preview.src = src; preview.onload=function(){ preview.style.display='block'; }; }
    if (file){ file.addEventListener('change', function(){ if (this.files && this.files[0]){ var r=new FileReader(); r.onload=function(e){ showPreview(e.target.result); }; r.readAsDataURL(this.files[0]); } }); }
    if (url){ url.addEventListener('input', function(){ showPreview(this.value); }); }
    // Map picker (Leaflet + Nominatim) - no API key required, with Google Maps link helper
    var head = document.getElementsByTagName('head')[0];
    function addLink(href, rel){ var l=document.createElement('link'); l.rel=rel; l.href=href; head.appendChild(l); }
    function addScript(src, onload){ var s=document.createElement('script'); s.src=src; s.onload=onload; document.body.appendChild(s); }
    addLink('https://unpkg.com/leaflet@1.9.4/dist/leaflet.css','stylesheet');
    addScript('https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', function(){
        var mapEl = document.getElementById('mapPicker');
        if (!mapEl) return;
        var map = L.map(mapEl).setView([-7.624, 111.523], 10);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19, attribution: '&copy; OpenStreetMap' }).addTo(map);
        var marker = null;
        var latEl = document.getElementById('e_lat');
        var lngEl = document.getElementById('e_lng');
        var locEl = document.getElementById('e_location');
        var gbtn = document.getElementById('btnOpenGmaps');
        function updateGmapsLink(lat, lng){ if(gbtn){ gbtn.href = 'https://www.google.com/maps?q=' + lat + ',' + lng; } }
        function setMarker(lat, lng){
            if (marker){ marker.setLatLng([lat,lng]); } else { marker = L.marker([lat,lng], {draggable:true}).addTo(map); marker.on('dragend', function(e){ var p=e.target.getLatLng(); latEl.value=p.lat.toFixed(6); lngEl.value=p.lng.toFixed(6); updateGmapsLink(p.lat, p.lng); reverseGeocode(p.lat, p.lng); }); }
            latEl.value = parseFloat(lat).toFixed(6);
            lngEl.value = parseFloat(lng).toFixed(6);
            updateGmapsLink(lat, lng);
        }
        function reverseGeocode(lat, lng){
            fetch('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat='+lat+'&lon='+lng)
                .then(r=>r.json()).then(function(d){ if(locEl && d && d.display_name){ locEl.value = d.display_name; } });
        }
        map.on('click', function(e){ setMarker(e.latlng.lat, e.latlng.lng); reverseGeocode(e.latlng.lat, e.latlng.lng); });
        // Search by address text
        var sb = document.getElementById('btnSearchAddress');
        if (sb){ sb.addEventListener('click', function(){ var q=locEl.value.trim(); if(!q) return; fetch('https://nominatim.openstreetmap.org/search?format=json&q='+encodeURIComponent(q)).then(r=>r.json()).then(function(res){ if(res && res.length){ var p=res[0]; map.setView([p.lat, p.lon], 14); setMarker(p.lat, p.lon); } }); }); }
        // Seed current coordinates if provided
        if (latEl.value && lngEl.value){ map.setView([parseFloat(latEl.value), parseFloat(lngEl.value)], 14); setMarker(latEl.value, lngEl.value); }
    });
})();
</script>
