@extends('layouts.lte.main')

@section('title', 'Edit Status Role | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#ffffff;">
  <div class="container" style="max-width:700px;">
    <div class="card shadow p-4 rounded-4 border-0">
      <h3 class="fw-bold text-center mb-4 text-warning">Edit Status Role User 🎭</h3>

      <div class="alert alert-info">
        <strong>User:</strong> {{ $roleUser->nama_user }}<br>
        <strong>Role:</strong> {{ $roleUser->nama_role }}
      </div>

      <form action="{{ route('admin.role.update', $roleUser->idrole_user) }}" method="POST">
        @csrf

        {{-- Status --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Status</label>
          <select name="status" 
                  class="form-select @error('status') is-invalid @enderror" 
                  required>
            <option value="">-- Pilih Status --</option>
            <option value="aktif" {{ old('status', ($roleUser->status == 1 || $roleUser->status == 'aktif') ? 'aktif' : 'nonaktif') == 'aktif' ? 'selected' : '' }}>
              Aktif
            </option>
            <option value="nonaktif" {{ old('status', ($roleUser->status == 0 || $roleUser->status == 'nonaktif') ? 'nonaktif' : 'aktif') == 'nonaktif' ? 'selected' : '' }}>
              Nonaktif
            </option>
          </select>
          @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Tombol Aksi --}}
        <div class="text-end mt-4">
          <a href="{{ route('admin.role.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-warning px-4">💾 Update Status</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection