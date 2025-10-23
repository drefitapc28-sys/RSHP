@extends('layout.main')

@section('title', 'Data Pemilik Hewan | RSHP Unair')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-lg border-0 rounded-4 p-4">
        <h2 class="text-center mb-3 text-gradient fw-bold">👩‍⚕️ Data Pemilik Hewan</h2>
        <p class="text-center text-muted">
            Berikut adalah daftar pemilik hewan yang terdaftar di 
            <strong>RSHP Universitas Airlangga</strong>.
        </p>

        <div class="d-flex justify-content-end mb-3">
            <a href="#" class="btn btn-success px-4">
                + Tambah Pemilik
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center shadow-sm rshp-table w-100">
                <thead style="background-color: #fde68a; border: 2px solid #e0b100;">
                    <tr>
                        <th style="width:6%;">No</th>
                        <th>Nama Pemilik</th>
                        <th>No. WhatsApp</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th style="width:15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $row->user_nama }}</td>
                        <td>{{ $row->no_wa }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->user_email }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-sm btn-primary">✏️ Edit</a>
                                <a href="#" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</a>
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
</div>

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
