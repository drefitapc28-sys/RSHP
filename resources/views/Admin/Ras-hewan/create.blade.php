@extends('layouts.lte.main')

@section('title', 'Tambah Ras Hewan | RSHP UNAIR')

@section('content')>
<section class="py-5" style="background-color:#fffff;">
  <div class="container" style="max-width:700px;">
    <div class="card shadow p-4 rounded-4 border-0">
      <h3 class="fw-bold text-center mb-4 text-primary">Tambah Ras Hewan 🐕</h3>

      <form action="{{ route('admin.ras-hewan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Ras Hewan</label>
          <input type="text" name="nama_ras"
                 class="form-control @error('nama_ras') is-invalid @enderror"
                 value="{{ old('nama_ras') }}" placeholder="Masukkan nama ras..." required>
          @error('nama_ras')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Jenis Hewan</label>
          <select name="idjenis_hewan"
                  class="form-select @error('idjenis_hewan') is-invalid @enderror"
                  required>
            <option value="">-- Pilih Jenis Hewan --</option>
            @foreach($jenisHewans as $j)
              <option value="{{ $j->idjenis_hewan }}" {{ old('idjenis_hewan') == $j->idjenis_hewan ? 'selected' : '' }}>
                {{ $j->nama_jenis_hewan }}
              </option>
            @endforeach
          </select>
          @error('idjenis_hewan')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="text-end mt-4">
          <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Simpan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
