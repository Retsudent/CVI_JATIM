<div class="container py-4">
    <h2>Tambah Campground</h2>
    <form method="post" action="/admin/campground">
        <div>
            <label>Nama</label>
            <input type="text" name="name" required />
        </div>
        <div>
            <label>Deskripsi</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label>Lokasi</label>
            <input type="text" name="location" required />
        </div>
        <div>
            <label>Harga per Orang</label>
            <input type="number" step="0.01" name="price_per_person" required />
        </div>
        <div>
            <label>Fasilitas</label>
            <textarea name="facilities"></textarea>
        </div>
        <div>
            <label>Kontak</label>
            <textarea name="contact_info"></textarea>
        </div>
        <div>
            <label>Status</label>
            <select name="status">
                <option value="active">active</option>
                <option value="inactive">inactive</option>
                <option value="maintenance">maintenance</option>
            </select>
        </div>
        <div>
            <label>Image URL/Path</label>
            <input type="text" name="image" />
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>


