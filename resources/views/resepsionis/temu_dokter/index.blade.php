@extends('layouts.lte.main')

@section('title', 'Data Temu Dokter | RSHP UNAIR')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        {{-- Breadcrumb --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Temu Dokter</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Pelayanan</a></li>
                    <li class="breadcrumb-item active">Temu Dokter</li>
                </ol>
            </div>
        </div>

        {{-- Alert --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Card --}}
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Temu Dokter</h3>
                        <div class="card-tools">
                            <a href="{{ route('resepsionis.temu-dokter.create') }}"
                               class="btn btn-primary btn-sm">
                                + Tambah Temu Dokter
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 80px">No</th>
                                    <th>Tanggal</th>
                                    <th>Pet</th>
                                    <th>Pemilik</th>
                                    <th>Dokter</th>
                                    <th>Status</th>
                                    <th style="width: 150px">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($temu as $t)
                                <tr>
                                    <td>{{ $t->no_urut }}</td>
                                    <td>{{ $t->waktu_daftar }}</td>
                                    <td>{{ $t->nama_pet }}</td>
                                    <td>{{ $t->nama_pemilik }}</td>
                                    <td>{{ $t->nama_dokter }}</td>
                                    <td>
                                        @if($t->status == 'A')
                                            <span class="badge bg-success">Aktif</span>
                                        @elseif($t->status == 'S')
                                            <span class="badge bg-primary">Selesai</span>
                                        @else
                                            <span class="badge bg-secondary">Batal</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('resepsionis.temu-dokter.edit', $t->idreservasi_dokter) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('resepsionis.temu-dokter.destroy', $t->idreservasi_dokter) }}"
                                              method="POST"
                                              style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin hapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Belum ada data temu dokter
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
