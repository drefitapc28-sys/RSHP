@extends('layouts.lte.main')

@section('title', 'Edit Pemilik | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#ffffff;">
  <div class="container" style="max-width:700px;">
    <div class="card shadow p-4 rounded-4 border-0">
      <h3 class="fw-bold text-center mb-4 text-warning">✏️ Edit Pemilik</h3>

      @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif

      <div class="alert alert-info">
        <p class="mb-1"><strong>Nama:</strong> {{ $pemilik->nama }}</p>
        <p class="mb-0"><strong>Email:</strong> {{ $pemilik->email }}</p>
      </div>

      <form action="{{ route('resepsionis.pemilik.update', $pemilik->idpemilik) }}" method="POST">
        @csrf

        {{-- No WhatsApp --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">No. WhatsApp</label>
          <input type="text" 
                 name="no_wa" 
                 class="form-control @error('no_wa') is-invalid @enderror" 
                 value="{{ old('no_wa', $pemilik->no_wa) }}" 
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
                    required>{{ old('alamat', $pemilik->alamat) }}</textarea>
          @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Tombol Aksi --}}
        <div class="text-end mt-4">
          <a href="{{ route('resepsionis.pemilik.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-warning px-4">💾 Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection