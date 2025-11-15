@extends('layouts.lte.main')

@section('title', 'Edit Data User & Role | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffff;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4 border-0">
      <h3 class="text-center fw-bold mb-4 text-primary">🧩 Edit Data User & Role</h3>

      <form action="{{ route('admin.role-user.update', $roleUser->idrole_user) }}" method="POST">
        @csrf

        {{-- Nama --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                 value="{{ old('nama', $roleUser->nama_user ?? '') }}" required>
          @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                 value="{{ old('email', $roleUser->email_user ?? '') }}" required>
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Password Baru (Opsional)</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                 placeholder="Kosongkan jika tidak ingin mengganti password">
          @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Role --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Pilih Role</label>
          <select name="idrole" class="form-select @error('idrole') is-invalid @enderror" required>
            @foreach($roles as $r)
              <option value="{{ $r->idrole }}" {{ $roleUser->idrole == $r->idrole ? 'selected' : '' }}>
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
            <option value="aktif" {{ $roleUser->status == 1 ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ $roleUser->status == 0 ? 'selected' : '' }}>Nonaktif</option>
          </select>
        </div>

        {{-- Tombol --}}
        <div class="text-end mt-4">
          <a href="{{ route('admin.role-user.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
