@extends('layout.Dashboard')

@section('title', 'Edit Data User & Role | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container">
    <h2 class="text-center fw-bold mb-4" style="color:#2563eb;">🧩 Edit Data User & Role</h2>

    <form action="{{ route('admin.role-user.update', $data->idrole_user) }}" method="POST"
          class="mx-auto border p-4 rounded-4" style="max-width:600px; background-color:white;">
      @csrf

      {{-- Nama --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Nama Lengkap</label>
        <input type="text" name="nama"
               class="form-control @error('nama') is-invalid @enderror"
               value="{{ old('nama', $data->user_nama ?? '') }}"
               placeholder="Masukkan nama pengguna..." required>
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Email --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Email</label>
        <input type="email" name="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $data->user_email ?? '') }}"
               placeholder="Masukkan email pengguna..." required>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Password (opsional) --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Password Baru (Opsional)</label>
        <input type="password" name="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="Kosongkan jika tidak ingin mengganti password">
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Role --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Pilih Role</label>
        <select name="idrole" class="form-select @error('idrole') is-invalid @enderror" required>
          @foreach($roles as $r)
            <option value="{{ $r->idrole }}" {{ $data->idrole == $r->idrole ? 'selected' : '' }}>
              {{ $r->nama_role }}
            </option>
          @endforeach
        </select>
        @error('idrole')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Status --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
          <option value="aktif" {{ $data->status == 1 ? 'selected' : '' }}>Aktif</option>
          <option value="nonaktif" {{ $data->status == 0 ? 'selected' : '' }}>Nonaktif</option>
        </select>
        @error('status')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Tombol --}}
      <div class="text-center mt-4">
        <a href="{{ route('admin.role-user.index') }}" class="btn btn-secondary me-2">⬅️ Kembali</a>
        <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
      </div>
    </form>
  </div>
</section>
@endsection
