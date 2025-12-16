@extends('layouts.lte.main')

@section('title', 'Tambah Pemilik | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#ffffff;">
  <div class="container" style="max-width:700px;">
    <div class="card shadow p-4 rounded-4 border-0">
      <h3 class="fw-bold text-center mb-4 text-primary">Registrasi Pemilik 🐾</h3>

      @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif

      <form action="{{ route('resepsionis.pemilik.store') }}" method="POST">
        @csrf

        {{-- Nama --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Lengkap</label>
          <input type="text" 
                 name="nama" 
                 class="form-control @error('nama') is-invalid @enderror" 
                 value="{{ old('nama') }}" 
                 placeholder="Masukkan nama lengkap..." 
                 required>
          @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Email</label>
          <input type="email" 
                 name="email" 
                 class="form-control @error('email') is-invalid @enderror" 
                 value="{{ old('email') }}" 
                 placeholder="Masukkan email..." 
                 required>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Password</label>
          <input type="password" 
                 name="password" 
                 class="form-control @error('password') is-invalid @enderror" 
                 placeholder="Masukkan password..." 
                 required>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- No WhatsApp --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">No. WhatsApp</label>
          <input type="text" 
                 name="no_wa" 
                 class="form-control @error('no_wa') is-invalid @enderror" 
                 value="{{ old('no_wa') }}" 
                 placeholder="Contoh: 081234567890" 
                 required>
          @error('no_wa')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Alamat</label>
          <textarea name="alamat" 
                    class="form-control @error('alamat') is-invalid @enderror" 
                    rows="3" 
                    placeholder="Masukkan alamat lengkap..." 
                    required>{{ old('alamat') }}</textarea>
          @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Tombol Aksi --}}
        <div class="text-end mt-4">
          <a href="{{ route('resepsionis.pemilik.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Daftar Pemilik</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection