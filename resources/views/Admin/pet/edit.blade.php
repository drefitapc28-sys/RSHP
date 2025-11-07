@extends('layout.Dashboard')

@section('title', 'Edit Hewan Peliharaan | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container" style="max-width:700px;">
    <div class="card shadow p-4 rounded-4 border-0">
      <h3 class="fw-bold text-center mb-4 text-primary">Edit Hewan Peliharaan 🐾</h3>

      <form action="{{ route('admin.pet.update', $data->idpet) }}" method="POST">
        @csrf

        {{-- Nama Hewan --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Hewan</label>
          <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" placeholder="Masukkan nama hewan..." required>
        </div>

        {{-- Tanggal Lahir --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" class="form-control">
        </div>

        {{-- Warna / Tanda --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Warna / Tanda</label>
          <input type="text" name="warna_tanda" value="{{ $data->warna_tanda }}" class="form-control" placeholder="Contoh: Putih belang hitam">
        </div>

        {{-- Jenis Kelamin --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-select" required>
            <option value="L" {{ $data->jenis_kelamin == 'L' ? 'selected' : '' }}>Jantan ♂</option>
            <option value="P" {{ $data->jenis_kelamin == 'P' ? 'selected' : '' }}>Betina ♀</option>
          </select>
        </div>

        {{-- Pemilik --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Pilih Pemilik</label>
          <select name="idpemilik" class="form-select" required>
            @foreach($pemilik as $p)
              <option value="{{ $p->idpemilik }}" {{ $data->idpemilik == $p->idpemilik ? 'selected' : '' }}>
                {{ $p->user->nama ?? 'Nama tidak tersedia' }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Ras Hewan --}}
        <div class="mb-3">
          <label class="form-label fw-semibold">Pilih Ras Hewan</label>
          <select name="idras_hewan" class="form-select" required>
            @foreach($ras as $r)
              <option value="{{ $r->idras_hewan }}" {{ $data->idras_hewan == $r->idras_hewan ? 'selected' : '' }}>
                {{ $r->nama_ras }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Tombol Aksi --}}
        <div class="text-end mt-4">
          <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary px-4">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary px-4">💾 Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
