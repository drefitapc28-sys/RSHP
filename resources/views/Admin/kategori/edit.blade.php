@extends('layout.main')

@section('title', 'Edit Kategori | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4">
      <h3 class="fw-bold text-center mb-3 text-primary">Edit Kategori 💉</h3>

      <form action="{{ route('admin.kategori.update', $kategori->idkategori) }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nama_kategori" class="form-label fw-semibold">Nama Kategori</label>
          <input type="text" name="nama_kategori" id="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control" required>
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
