@extends('layouts.lte.main')

@section('title', 'Edit Jenis Hewan | RSHP Universitas Airlangga')

@section('content')
<section class="py-5" style="background-color:#fffff;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow-lg border-0 rounded-4 p-4">
      <h3 class="text-gradient fw-bold text-center mb-4">✏️ Edit Jenis Hewan</h3>

      <form action="{{ route('admin.jenis-hewan.update', $jenisHewan->idjenis_hewan) }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Jenis Hewan</label>
          <input type="text"
                 name="nama_jenis_hewan"
                 class="form-control @error('nama_jenis_hewan') is-invalid @enderror"
                 value="{{ old('nama_jenis_hewan', $jenisHewan->nama_jenis_hewan) }}"
                 placeholder="Masukkan nama jenis hewan...">
          @error('nama_jenis_hewan')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="text-center mt-4">
          <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
