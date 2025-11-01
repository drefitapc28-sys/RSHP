@extends('layout.main')

@section('title', 'Tambah Kode Tindakan | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container" style="max-width:700px;">
    <div class="card shadow p-4 rounded-4">
      <h3 class="fw-bold text-center mb-4 text-primary">Tambah Kode Tindakan 💉</h3>

      <form action="{{ route('admin.kode-tindakan-terapi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label fw-semibold">Kode</label>
          <input type="text" name="kode" class="form-control" placeholder="Masukkan kode tindakan..." required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Deskripsi Tindakan</label>
          <textarea name="deskripsi_tindakan_terapi" class="form-control" rows="3" placeholder="Masukkan deskripsi tindakan..." required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Kategori</label>
          <select name="idkategori" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $k)
              <option value="{{ $k->idkategori }}">{{ $k->nama_kategori }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">Kategori Klinis</label>
          <select name="idkategori_klinis" class="form-select" required>
            <option value="">-- Pilih Kategori Klinis --</option>
            @foreach($kategoriKlinis as $kk)
              <option value="{{ $kk->idkategori_klinis }}">{{ $kk->nama_kategori_klinis }}</option>
            @endforeach
          </select>
        </div>

        <div class="text-end">
          <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Simpan</button>
        </div>

        {{-- Pesan notifikasi --}}
        @if(session('error'))
          <div class="alert alert-danger text-center mt-3">{{ session('error') }}</div>
        @endif

        @if(session('success'))
          <div class="alert alert-success text-center mt-3">{{ session('success') }}</div>
        @endif
      </form>
    </div>
  </div>
</section>
@endsection
