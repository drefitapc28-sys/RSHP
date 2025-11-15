@extends('layouts.lte.main')

@section('title', 'Tambah Relasi Role User | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffff;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4 border-0">
      <h3 class="text-center fw-bold mb-4 text-primary">🧩 Tambah Relasi Role User</h3>

      <form action="{{ route('admin.role-user.store') }}" method="POST">
        @csrf

        {{-- Nama --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                 value="{{ old('nama') }}" placeholder="Masukkan nama pengguna..." required>
          @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                 value="{{ old('email') }}" placeholder="Masukkan email pengguna..." required>
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Password</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                 placeholder="Masukkan password..." required>
          @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-control"
                 placeholder="Ketik ulang password..." required>
        </div>

        {{-- Role --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Pilih Role</label>
          <select name="idrole" class="form-select @error('idrole') is-invalid @enderror" required>
            <option value="">-- Pilih Role --</option>
            @foreach($roles as $r)
              <option value="{{ $r->idrole }}" {{ old('idrole') == $r->idrole ? 'selected' : '' }}>
                {{ $r->nama_role }}
              </option>
            @endforeach
          </select>
          @error('idrole') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Status --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Status</label>
          <select name="status" class="form-select" required>
            <option value="">-- Pilih Status --</option>
            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
          </select>
        </div>

        {{-- Tombol --}}
        <div class="text-end mt-4">
          <a href="{{ route('admin.role-user.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Simpan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
