@extends('layout.Dashboard')

@section('title', 'Kategori Tindakan | RSHP Unair')

@section('content')
<div class="container-fluid mt-4">
  <div class="card shadow-lg border-0 rounded-4 p-4">
    <h2 class="text-center mb-3 text-gradient fw-bold">💉 Kategori Tindakan</h2>
    <p class="text-center text-muted">
        Berikut adalah daftar <strong>kategori tindakan</strong> yang digunakan di RSHP Universitas Airlangga.
    </p>

    {{-- Tombol Tambah --}}
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.kategori.create') }}" class="btn btn-success px-4">+ Tambah Kategori</a>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
      <div class="alert alert-success text-center fw-semibold">
        {{ session('success') }}
      </div>
    @endif

    {{-- Tabel data --}}
    <div class="table-responsive">
      <table class="table table-hover table-bordered align-middle text-center shadow-sm rshp-table w-100">
        <thead style="background-color: #fde68a; border: 2px solid #e0b100;">
          <tr>
            <th style="width:10%;">ID</th>
            <th>Nama Kategori</th>
            <th style="width:15%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($data as $row)
          <tr>
            <td>{{ $row->idkategori }}</td>
            <td>{{ $row->nama_kategori }}</td>
            <td>
              <div class="btn-group" role="group">
                <a href="{{ route('admin.kategori.edit', $row->idkategori) }}" class="btn btn-sm btn-primary">✏️ Edit</a>
                <a href="{{ route('admin.kategori.delete', $row->idkategori) }}" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</a>
              </div>
            </td>
          </tr>
          @empty
          <tr><td colspan="3" class="text-muted fst-italic">Tidak ada data ditemukan</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- CSS khusus untuk tabel RSHP --}}
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

    .card {
        margin: 0 20px;
    }
</style>
@endsection
