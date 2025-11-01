@extends('layout.Dashboard')

@section('title', 'Kategori Klinis | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container-fluid">
    <h2 class="text-center mb-3 text-primary fw-bold">⚕️ Kategori Klinis</h2>
    <p class="text-center text-muted mb-4">
      Berikut adalah daftar <strong>kategori klinis</strong> yang digunakan di RSHP Universitas Airlangga.
    </p>

    {{-- Tombol Tambah --}}
    <div class="d-flex justify-content-end mb-3">
      <a href="{{ route('admin.kategori-klinis.create') }}" class="btn btn-success px-4">+ Tambah Kategori Klinis</a>
    </div>

    {{-- Tabel Data --}}
    <div class="table-responsive">
      <table class="table table-hover table-bordered align-middle text-center shadow-sm rshp-table w-100">
        <thead style="background-color: #fde68a; border: 2px solid #e0b100;">
          <tr>
            <th style="width:10%;">ID</th>
            <th>Nama Kategori Klinis</th>
            <th style="width:15%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($data as $row)
          <tr>
            <td>{{ $row->idkategori_klinis }}</td>
            <td>{{ $row->nama_kategori_klinis }}</td>
            <td>
              <div class="btn-group" role="group">
                <a href="{{ route('admin.kategori-klinis.edit', $row->idkategori_klinis) }}" class="btn btn-sm btn-primary">✏️ Edit</a>
                <form action="{{ route('admin.kategori-klinis.delete', $row->idkategori_klinis) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="d-inline">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-danger">🗑️ Hapus</button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3" class="text-muted fst-italic">Tidak ada data ditemukan</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- CSS untuk konsistensi RSHP --}}
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
