@extends('layout.Dashboard')

@section('title', 'Tambah Hewan Peliharaan | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container" style="max-width:700px;">
    <div class="card shadow p-4 rounded-4 border-0">
      <h3 class="fw-bold text-center mb-4 text-primary">Tambah Hewan Peliharaan 🐾</h3>

      <form action="{{ route('admin.pet.store') }}" method="POST">
        @csrf

        {{-- Nama Hewan --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Hewan</label>
          <input type="text" 
                 name="nama" 
                 class="form-control @error('nama') is-invalid @enderror" 
                 value="{{ old('nama') }}" 
                 placeholder="Masukkan nama hewan..." 
                 required>
          @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Tanggal Lahir --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Tanggal Lahir</label>
          <input type="date" 
                 name="tanggal_lahir" 
                 class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                 value="{{ old('tanggal_lahir') }}">
          @error('tanggal_lahir')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Warna / Tanda --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Warna / Tanda</label>
          <input type="text" 
                 name="warna_tanda" 
                 class="form-control @error('warna_tanda') is-invalid @enderror" 
                 value="{{ old('warna_tanda') }}" 
                 placeholder="Contoh: Putih belang hitam">
          @error('warna_tanda')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Jenis Kelamin --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Jenis Kelamin</label>
          <select name="jenis_kelamin" 
                  class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                  required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Jantan ♂</option>
            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Betina ♀</option>
          </select>
          @error('jenis_kelamin')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Pemilik --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Pilih Pemilik</label>
          <select name="idpemilik" 
                  class="form-select @error('idpemilik') is-invalid @enderror" 
                  required>
            <option value="">-- Pilih Pemilik --</option>
            @foreach($pemilik as $p)
              <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>
                {{ $p->nama }}
              </option>
            @endforeach
          </select>
          @error('idpemilik')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Ras Hewan --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Pilih Ras Hewan</label>
          <select name="idras_hewan" 
                  class="form-select @error('idras_hewan') is-invalid @enderror" 
                  required>
            <option value="">-- Pilih Ras --</option>
            @foreach($ras as $r)
              <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan') == $r->idras_hewan ? 'selected' : '' }}>
                {{ $r->nama_ras }}
              </option>
            @endforeach
          </select>
          @error('idras_hewan')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Tombol Aksi --}}
        <div class="text-end mt-4">
          <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Simpan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
