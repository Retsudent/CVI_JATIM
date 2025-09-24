<div class="container py-4">
    <h2>Tambah Merchandise</h2>
    <form method="post" action="/admin/merchandise">
        <div>
            <label>Nama</label>
            <input type="text" name="name" required />
        </div>
        <div>
            <label>Deskripsi</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label>Harga</label>
            <input type="number" step="0.01" name="price" required />
        </div>
        <div>
            <label>Kategori</label>
            <input type="text" name="category" required />
        </div>
        <div>
            <label>Stok</label>
            <input type="number" name="stock" value="0" />
        </div>
        <div>
            <label>Status</label>
            <select name="status">
                <option value="available">available</option>
                <option value="out_of_stock">out_of_stock</option>
                <option value="discontinued">discontinued</option>
            </select>
        </div>
        <div>
            <label>Image URL/Path</label>
            <input type="text" name="image" />
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>


