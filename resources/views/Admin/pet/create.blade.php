@extends('layout.main')

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
          <input type="text" name="nama" class="form-control" placeholder="Masukkan nama hewan..." required>
        </div>

        {{-- Tanggal Lahir --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" class="form-control">
        </div>

        {{-- Warna / Tanda --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Warna / Tanda</label>
          <input type="text" name="warna_tanda" class="form-control" placeholder="Contoh: Putih belang hitam">
        </div>

        {{-- Jenis Kelamin --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-select" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L">Jantan ♂</option>
            <option value="P">Betina ♀</option>
          </select>
        </div>

        {{-- Pemilik --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Pilih Pemilik</label>
          <select name="idpemilik" class="form-select" required>
            <option value="">-- Pilih Pemilik --</option>
            @foreach($pemilik as $p)
              <option value="{{ $p->idpemilik }}">{{ $p->user->nama ?? 'Nama tidak tersedia' }}</option>
            @endforeach
          </select>
        </div>

        {{-- Ras Hewan --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Pilih Ras Hewan</label>
          <select name="idras_hewan" class="form-select" required>
            <option value="">-- Pilih Ras --</option>
            @foreach($ras as $r)
              <option value="{{ $r->idras_hewan }}">{{ $r->nama_ras }}</option>
            @endforeach
          </select>
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
