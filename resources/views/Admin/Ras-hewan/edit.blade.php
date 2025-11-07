@extends('layout.Dashboard')

@section('title', 'Edit Ras Hewan | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container" style="max-width:700px;">
    <div class="card shadow p-4 rounded-4 border-0">
      <h3 class="fw-bold text-center mb-4 text-primary">Edit Ras Hewan 🐕</h3>

      <form action="{{ route('admin.ras-hewan.update', $rasHewan->idras_hewan) }}" method="POST">
        @csrf

        {{-- Nama Ras --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Ras Hewan</label>
          <input type="text" name="nama_ras" value="{{ $rasHewan->nama_ras }}" class="form-control" required>
        </div>

        {{-- Jenis Hewan --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Jenis Hewan</label>
          <select name="idjenis_hewan" class="form-select" required>
            @foreach ($jenisHewan as $j)
              <option value="{{ $j->idjenis_hewan }}" 
                {{ $rasHewan->idjenis_hewan == $j->idjenis_hewan ? 'selected' : '' }}>
                {{ $j->nama_jenis_hewan }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Tombol --}}
        <div class="text-end mt-4">
          <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
