@extends('layouts.lte.main')  

@section('title', 'Edit Kategori | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffff;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4">
      <h3 class="fw-bold text-center mb-3 text-primary">Edit Kategori 💉</h3>

      <form action="{{ route('admin.kategori.update', $kategori->idkategori) }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nama_kategori" class="form-label fw-semibold">Nama Kategori</label>
          <input type="text"
                 name="nama_kategori"
                 id="nama_kategori"
                 value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                 class="form-control @error('nama_kategori') is-invalid @enderror"
                 placeholder="Masukkan nama kategori...">
          @error('nama_kategori')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="text-end">
          <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
