@extends('layouts.lte.main')

@section('title', 'Edit Kategori Klinis | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffff;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4">
      <h3 class="fw-bold text-center mb-3 text-primary">Edit Kategori Klinis 🧬</h3>

      <form action="{{ route('admin.kategori-klinis.update', $kategoriKlinis->idkategori_klinis) }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nama_kategori_klinis" class="form-label fw-semibold">Nama Kategori Klinis</label>
          <input type="text"
                 name="nama_kategori_klinis"
                 id="nama_kategori_klinis"
                 value="{{ old('nama_kategori_klinis', $kategoriKlinis->nama_kategori_klinis) }}"
                 class="form-control @error('nama_kategori_klinis') is-invalid @enderror"
                 placeholder="Masukkan nama kategori klinis...">
          @error('nama_kategori_klinis')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="text-end">
          <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
