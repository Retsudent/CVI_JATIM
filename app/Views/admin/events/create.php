<div class="container py-4">
    <h2>Tambah Event</h2>
    <form method="post" action="/admin/events">
        <div>
            <label>Judul</label>
            <input type="text" name="title" required />
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
            <label>Tanggal Mulai</label>
            <input type="date" name="start_date" required />
        </div>
        <div>
            <label>Tanggal Selesai</label>
            <input type="date" name="end_date" required />
        </div>
        <div>
            <label>Harga</label>
            <input type="number" step="0.01" name="price" />
        </div>
        <div>
            <label>Status</label>
            <select name="status">
                <option value="upcoming">upcoming</option>
                <option value="ongoing">ongoing</option>
                <option value="completed">completed</option>
                <option value="cancelled">cancelled</option>
            </select>
        </div>
        <div>
            <label>Image URL/Path</label>
            <input type="text" name="image" />
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>


