@extends('layout.Dashboard')

@section('title', 'Data Jenis Hewan | RSHP Unair')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-lg border-0 rounded-4 p-4">
        <h2 class="text-center mb-3 text-gradient fw-bold">🐾 Data Jenis Hewan</h2>
        <p class="text-center text-muted">
            Berikut adalah daftar <strong>jenis hewan</strong> yang terdaftar pada sistem 
            <strong>RSHP Universitas Airlangga</strong>.
        </p>

        {{-- Alert notifikasi berhasil --}}
        @if(session('success'))
            <div class="alert alert-success text-center fw-semibold">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol Tambah --}}
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.jenis-hewan.create') }}" class="btn btn-success px-4">
                + Tambah Jenis Hewan
            </a>
        </div>

        {{-- Tabel Jenis Hewan --}}
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center shadow-sm rshp-table w-100">
                <thead style="background-color: #fde68a; border: 2px solid #e0b100;">
                    <tr>
                        <th style="width:8%;">No</th>
                        <th>Nama Jenis Hewan</th>
                        <th style="width:20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $row->nama_jenis_hewan }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.jenis-hewan.edit', $row->idjenis_hewan) }}" 
                                   class="btn btn-sm btn-primary">✏️ Edit</a>
                                <form action="{{ route('admin.jenis-hewan.delete', $row->idjenis_hewan) }}" 
                                      method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-muted fst-italic">Tidak ada data ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- CSS --}}
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

    .btn-group .btn {
        border-radius: 6px;
        margin: 0 2px;
    }

    .btn-primary {
        background-color: #1976d2;
        border-color: #115293;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #b02a37;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #1e7e34;
    }
</style>
@endsection
