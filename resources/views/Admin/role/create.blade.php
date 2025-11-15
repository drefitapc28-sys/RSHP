@extends('layouts.lte.main')

@section('title', 'Tambah Role | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffff;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4 border-0">
      <h3 class="fw-bold text-center mb-4 text-primary">Tambah Role 🧩</h3>

      <form action="{{ route('admin.role.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nama_role" class="form-label fw-semibold">Nama Role</label>
          <input type="text" name="nama_role" id="nama_role"
                 class="form-control @error('nama_role') is-invalid @enderror"
                 value="{{ old('nama_role') }}"
                 placeholder="Masukkan nama role..." required>
          @error('nama_role')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="text-end mt-4">
          <a href="{{ route('admin.role.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Simpan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
