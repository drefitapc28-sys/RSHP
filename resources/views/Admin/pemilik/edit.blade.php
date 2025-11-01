@extends('layout.main')

@section('title', 'Edit Pemilik Hewan | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container">
    <h2 class="text-center fw-bold mb-4" style="color:#2563eb;">
      🐾 Edit Pemilik Hewan
    </h2>

    {{-- Form Edit Pemilik --}}
    <form action="{{ route('admin.pemilik.update', $pemilik->idpemilik) }}" method="POST" 
          class="mx-auto border p-4 rounded-4" style="max-width:500px; background-color:white;">
      @csrf

      {{-- Nomor WA --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Nomor WhatsApp</label>
        <input 
          type="text" 
          name="no_wa" 
          value="{{ $pemilik->no_wa }}" 
          class="form-control" 
          required>
      </div>

      {{-- Alamat --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Alamat</label>
        <textarea 
          name="alamat" 
          class="form-control" 
          rows="3" 
          required>{{ $pemilik->alamat }}</textarea>
      </div>

      {{-- User Pemilik --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">User Pemilik</label>
        <select name="iduser" class="form-select" required>
          @foreach($users as $u)
            <option value="{{ $u->iduser }}" {{ $pemilik->iduser == $u->iduser ? 'selected' : '' }}>
              {{ $u->nama }}
            </option>
          @endforeach
        </select>
      </div>

      {{-- Tombol --}}
      <div class="text-center mt-4">
        <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary me-2">⬅️ Kembali</a>
        <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
      </div>
    </form>
  </div>
</section>
@endsection
