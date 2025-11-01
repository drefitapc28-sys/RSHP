@extends('layout.main')

@section('title', 'Edit Relasi Role User | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container">
    <h2 class="text-center fw-bold mb-4" style="color:#2563eb;">🧩 Edit Relasi Role User</h2>

    <form action="{{ route('admin.role-user.update', $data->idrole_user) }}" method="POST" 
          class="mx-auto border p-4 rounded-4" style="max-width:500px; background-color:white;">
      @csrf

      {{-- Pilih User --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Pilih User</label>
        <select name="iduser" class="form-select" required>
          @foreach($users as $u)
            <option value="{{ $u->iduser }}" {{ $data->iduser == $u->iduser ? 'selected' : '' }}>
              {{ $u->nama }} ({{ $u->email }})
            </option>
          @endforeach
        </select>
      </div>

      {{-- Pilih Role --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Pilih Role</label>
        <select name="idrole" class="form-select" required>
          @foreach($roles as $r)
            <option value="{{ $r->idrole }}" {{ $data->idrole == $r->idrole ? 'selected' : '' }}>
              {{ $r->nama_role }}
            </option>
          @endforeach
        </select>
      </div>

      {{-- Status --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Status</label>
        <select name="status" class="form-select" required>
          <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Aktif</option>
          <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Nonaktif</option>
        </select>
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
