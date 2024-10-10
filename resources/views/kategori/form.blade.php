<div class="div1">
     <label class="form-label" for="deskripsi">Nama Gudang</label>
     <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control" value="{{ old('name', $kategori->deskripsi ?? '') }}" required>
</div>
<div class="mt-3">
     <button type="submit" class="btn btn-success">Simpan</button>
     <a href="{{ route('kategori.index') }}" class="btn btn-danger">Kembali</a>
</div>
