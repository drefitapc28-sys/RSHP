@extends('layouts.lte.main')

@section('title', 'Tambahkan Role | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#ffffff;">
  <div class="container" style="max-width:700px;">
    <div class="card shadow p-4 rounded-4 border-0">
      <h3 class="fw-bold text-center mb-4 text-primary">Tambahkan Role ke User 🎭</h3>

      <form action="{{ route('admin.role.store') }}" method="POST">
        @csrf

        {{-- Pilih User --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Pilih User</label>
          <select name="iduser" 
                  class="form-select @error('iduser') is-invalid @enderror" 
                  required>
            <option value="">-- Pilih User --</option>
            @foreach($users as $user)
              <option value="{{ $user->iduser }}" {{ old('iduser') == $user->iduser ? 'selected' : '' }}>
                {{ $user->nama }}
              </option>
            @endforeach
          </select>
          @error('iduser')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Pilih Role --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Pilih Role</label>
          <select name="idrole" 
                  class="form-select @error('idrole') is-invalid @enderror" 
                  required>
            <option value="">-- Pilih Role --</option>
            @foreach($allRoles as $role)
              <option value="{{ $role->idrole }}" {{ old('idrole') == $role->idrole ? 'selected' : '' }}>
                {{ $role->nama_role }}
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
          <select name="status" 
                  class="form-select @error('status') is-invalid @enderror" 
                  required>
            <option value="">-- Pilih Status --</option>
            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
          </select>
          @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Tombol Aksi --}}
        <div class="text-end mt-4">
          <a href="{{ route('admin.role.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Simpan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection