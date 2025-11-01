@extends('layout.Dashboard')

@section('title', 'Kode Tindakan Terapi | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container-fluid">
    <h2 class="text-center mb-3 text-primary fw-bold">💊 Kode Tindakan & Terapi</h2>
    <p class="text-center text-muted">
      Berikut adalah daftar <strong>kode tindakan dan terapi</strong> yang digunakan di RSHP Universitas Airlangga.
    </p>

    {{-- Tombol Tambah --}}
    <div class="d-flex justify-content-end mb-3">
      <a href="{{ route('admin.kode-tindakan-terapi.create') }}" class="btn btn-success px-4">+ Tambah Kode</a>
    </div>

    {{-- Tabel Data --}}
    <div class="table-responsive">
      <table class="table table-hover table-bordered align-middle text-center shadow-sm rshp-table w-100">
        <thead style="background-color: #fde68a; border: 2px solid #e0b100;">
          <tr>
            <th style="width:8%;">ID</th>
            <th style="width:10%;">Kode</th>
            <th>Deskripsi</th>
            <th style="width:15%;">Kategori</th>
            <th style="width:18%;">Kategori Klinis</th>
            <th style="width:15%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($data as $row)
          <tr>
            <td>{{ $row->idkode_tindakan_terapi }}</td>
            <td>{{ $row->kode }}</td>
            <td>{{ $row->deskripsi_tindakan_terapi }}</td>
            <td>{{ $row->nama_kategori }}</td>
            <td>{{ $row->nama_kategori_klinis }}</td>
            <td>
              <div class="btn-group" role="group">
                <a href="{{ route('admin.kode-tindakan-terapi.edit', $row->idkode_tindakan_terapi) }}" class="btn btn-sm btn-primary">✏️ Edit</a>
                <form action="{{ route('admin.kode-tindakan-terapi.delete', $row->idkode_tindakan_terapi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">🗑️ Hapus</button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-muted fst-italic">Tidak ada data ditemukan</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
      <div class="alert alert-success text-center mt-3">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger text-center mt-3">{{ session('error') }}</div>
    @endif
  </div>
</section>

{{-- CSS Konsistensi RSHP --}}
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
