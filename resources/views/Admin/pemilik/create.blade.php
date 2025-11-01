@extends('layout.main')

@section('title', 'Tambah Pemilik Hewan | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container">
    <h2 class="text-center fw-bold mb-4" style="color:#2563eb;">
      🐾 Tambah Pemilik Hewan
    </h2>

    {{-- Form Tambah Pemilik --}}
    <form action="{{ route('admin.pemilik.store') }}" method="POST" class="mx-auto border p-4 rounded-4" style="max-width:500px; background-color:white;">
      @csrf

      {{-- Nomor WA --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Nomor WhatsApp</label>
        <input 
          type="text" 
          name="no_wa" 
          class="form-control" 
          placeholder="Masukkan nomor WhatsApp aktif..." 
          required>
      </div>

      {{-- Alamat --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Alamat</label>
        <textarea 
          name="alamat" 
          class="form-control" 
          rows="3" 
          placeholder="Masukkan alamat lengkap pemilik..." 
          required></textarea>
      </div>

      {{-- User Pemilik --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">User Pemilik</label>
        <select name="iduser" class="form-select" required>
          <option value="">-- Pilih User --</option>
          @foreach($users as $u)
            <option value="{{ $u->iduser }}">{{ $u->nama }}</option>
          @endforeach
        </select>
      </div>

      {{-- Tombol --}}
      <div class="text-center mt-4">
        <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary me-2">⬅️ Kembali</a>
        <button type="submit" class="btn btn-primary">💾 Simpan</button>
      </div>
    </form>
  </div>
</section>
@endsection
