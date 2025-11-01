@extends('layout.main')

@section('title', 'Tambah Role | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4">
      <h3 class="fw-bold text-center mb-3 text-primary">Tambah Role 🧩</h3>

      <form action="{{ route('admin.role.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nama_role" class="form-label">Nama Role</label>
          <input type="text" name="nama_role" id="nama_role" class="form-control" placeholder="Masukkan nama role..." required>
        </div>

        <div class="text-end">
          <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary">💾 Simpan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
