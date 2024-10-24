<div class="mb-3">
     <label for="nama">Nama</label>
     <input type="text" name="nama" value="{{ old('nama', $kategori->nama ?? '') }}" class="form-control" placeholder="Nama Kategori" required>
</div>
<div class="mb-3">
     <label for="deskripsi">Deskripsi</label>
     <input type="text" name="deskripsi" value="{{ old('deskripsi', $kategori->deskripsi ?? '') }}" class="form-control" placeholder="Keterangan (opsional)">
</div>
<div class="">
     <button type="submit" class="btn btn-primary">Simpan</button>
     <a href="/kategori" class="btn btn-danger">Kembali</a>
</div>