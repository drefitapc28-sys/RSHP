@extends('layout.Dashboard')

@section('title', 'Role Pengguna | RSHP Unair')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-lg border-0 rounded-4 p-4">
        <h2 class="text-center mb-3 text-gradient fw-bold">🧑‍⚕️ Role Pengguna</h2>
        <p class="text-center text-muted">
            Berikut adalah daftar <strong>role</strong> atau peran pengguna dalam sistem 
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
            <a href="{{ route('admin.role.create') }}" class="btn btn-success px-4">
                + Tambah Role
            </a>
        </div>

        {{-- Tabel Role --}}
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center shadow-sm rshp-table w-100">
                <thead style="background-color: #fde68a; border: 2px solid #e0b100;">
                    <tr>
                        <th style="width:8%;">No</th>
                        <th>Nama Role</th>
                        <th style="width:20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $row)
                    <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->nama_role }}</td>
                    <td>
                        <div class="btn-group" role="group">
                        <a href="{{ route('admin.role.edit', $row->idrole) }}" class="btn btn-sm btn-primary">✏️ Edit</a>

                        <form action="{{ route('admin.role.delete', $row->idrole) }}" method="POST" style="display:inline-block;"
                                onsubmit="return confirm('Yakin ingin menghapus role ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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

{{-- CSS agar konsisten dengan halaman RSHP lainnya --}}
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
