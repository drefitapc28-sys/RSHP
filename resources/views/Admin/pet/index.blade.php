@extends('layout.Dashboard')

@section('title', 'Data Hewan Peliharaan | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container-fluid">
    <h2 class="text-center mb-3 text-primary fw-bold">🐶 Data Hewan Peliharaan</h2>
    <p class="text-center text-muted">
      Berikut adalah daftar hewan peliharaan yang terdaftar di 
      <strong>Rumah Sakit Hewan Pendidikan Universitas Airlangga</strong>.
    </p>

    {{-- Tombol Tambah --}}
    <div class="d-flex justify-content-end mb-3">
      <a href="{{ route('admin.pet.create') }}" class="btn btn-success px-4">+ Tambah Hewan</a>
    </div>

    {{-- Tabel Data --}}
    <div class="table-responsive">
      <table class="table table-hover table-bordered align-middle text-center shadow-sm rshp-table w-100">
        <thead style="background-color:#fde68a; border:2px solid #e0b100;">
          <tr>
            <th style="width:5%;">No</th>
            <th>Nama Hewan</th>
            <th>Ras</th>
            <th>Pemilik</th>
            <th>Jenis Kelamin</th>
            <th style="width:15%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($data as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nama_ras ?? '-' }}</td>
            <td>{{ $item->nama_pemilik ?? '-' }}</td>
            <td>
              @if ($item->jenis_kelamin == 'L')
                <span class="badge bg-info text-dark">Jantan ♂</span>
              @elseif ($item->jenis_kelamin == 'P')
                <span class="badge" style="background-color:#e83e8c; color:white;">Betina ♀</span>
              @else
                <span class="badge bg-secondary">Tidak Diketahui</span>
              @endif
            </td>
            <td>
              <div class="btn-group" role="group">
                <a href="{{ route('admin.pet.edit', $item->idpet) }}" class="btn btn-sm btn-primary">✏️ Edit</a>
                <form action="{{ route('admin.pet.delete', $item->idpet) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">🗑️ Hapus</button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-muted fst-italic">Tidak ada data ditemukan.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- CSS agar tabel konsisten dengan halaman lain --}}
<style>
  .rshp-table {
      width: 100%;
      border: 2px solid #c9a400;
      border-collapse: collapse !important;
      background-color: #fffef5;
  }

  .rshp-table th, .rshp-table td {
      border: 1.5px solid #d4b400 !important;
      padding: 10px;
      vertical-align: middle;
  }

  .rshp-table tr:hover {
      background-color: #fff8dc;
      transition: 0.2s;
  }

  .btn-group .btn {
      margin: 0 2px;
  }
</style>
@endsection
