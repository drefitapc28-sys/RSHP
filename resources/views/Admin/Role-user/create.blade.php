@extends('layout.Dashboard')

@section('title', 'Tambah Relasi Role User | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4">
    <h2 class="text-center fw-bold mb-4" style="color:#2563eb;">🧩 Tambah Relasi Role User</h2>

    <form action="{{ route('admin.role-user.store') }}" method="POST">
      @csrf

      {{-- Nama --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
              placeholder="Masukkan nama pengguna..." value="{{ old('nama') }}">
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Email --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
              placeholder="Masukkan email pengguna..." value="{{ old('email') }}">
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Password --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
              placeholder="Masukkan password...">
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Konfirmasi Password --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control"
              placeholder="Ketik ulang password...">
      </div>

      {{-- Pilih Role --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Pilih Role</label>
        <select name="idrole" class="form-select" required>
          <option value="">-- Pilih Role --</option>
          @foreach($roles as $r)
            <option value="{{ $r->idrole }}">{{ $r->nama_role }}</option>
          @endforeach
        </select>
      </div>

      {{-- Status --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Status</label>
        <select name="status" class="form-select" required>
          <option value="">-- Pilih Status --</option>
          <option value="aktif">Aktif</option>
          <option value="nonaktif">Nonaktif</option>
        </select>
      </div>

      <div class="text-end">
        <a href="{{ route('admin.role-user.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
        <button type="submit" class="btn btn-primary">💾 Simpan</button>
      </div>
    </form>
  </div>
</section>
@endsection
