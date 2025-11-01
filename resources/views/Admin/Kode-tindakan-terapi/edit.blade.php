@extends('layout.main')

@section('title', 'Edit Kode Tindakan | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container" style="max-width:700px;">
    <div class="card shadow p-4 rounded-4">
      <h3 class="fw-bold text-center mb-4 text-primary">Edit Kode Tindakan 💉</h3>

      <form action="{{ route('admin.kode-tindakan-terapi.update', $data->idkode_tindakan_terapi) }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label fw-semibold">Kode</label>
          <input type="text" name="kode" value="{{ $data->kode }}" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Deskripsi Tindakan</label>
          <textarea name="deskripsi_tindakan_terapi" class="form-control" rows="3" required>{{ $data->deskripsi_tindakan_terapi }}</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Kategori</label>
          <select name="idkategori" class="form-select" required>
            @foreach($kategori as $k)
              <option value="{{ $k->idkategori }}" {{ $data->idkategori == $k->idkategori ? 'selected' : '' }}>
                {{ $k->nama_kategori }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">Kategori Klinis</label>
          <select name="idkategori_klinis" class="form-select" required>
            @foreach($kategoriKlinis as $kk)
              <option value="{{ $kk->idkategori_klinis }}" {{ $data->idkategori_klinis == $kk->idkategori_klinis ? 'selected' : '' }}>
                {{ $kk->nama_kategori_klinis }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="text-end">
          <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Simpan Perubahan</button>
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
