@extends('layout.main')

@section('title', 'Edit Jenis Hewan | RSHP Universitas Airlangga')

@section('content')
<div class="container py-5">
  <div class="card shadow-lg border-0 rounded-4 p-4">
    <h3 class="text-gradient fw-bold text-center mb-4">✏️ Edit Jenis Hewan</h3>

    <form action="{{ route('admin.jenis-hewan.update', $jenisHewan->idjenis_hewan) }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label fw-semibold">Nama Jenis Hewan</label>
        <input 
          type="text" 
          name="nama_jenis_hewan" 
          class="form-control" 
          value="{{ $jenisHewan->nama_jenis_hewan }}" 
          required>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary px-4">💾 Simpan Perubahan</button>
        <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
      </div>
    </form>
  </div>
</div>
@endsection
