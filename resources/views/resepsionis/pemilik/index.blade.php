@extends('layouts.lte.main')

@section('title', 'Data Pemilik | RSHP UNAIR')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        {{-- Breadcrumb --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Pemilik</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Pemilik</li>
                </ol>
            </div>
        </div>

        {{-- Alert Messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Card --}}
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Pemilik</h3>
                        <div class="card-tools">
                            <a href="{{ route('resepsionis.pemilik.create') }}" 
                               class="btn btn-primary btn-sm">
                                + Tambah Pemilik
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 80px">ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. WhatsApp</th>
                                    <th>Alamat</th>
                                    <th style="width: 150px">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($pemilik as $p)
                                <tr>
                                    <td>{{ $p->idpemilik }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->no_wa }}</td>
                                    <td>{{ $p->alamat }}</td>

                                    <td>
                                        <a href="{{ route('resepsionis.pemilik.edit', $p->idpemilik) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('resepsionis.pemilik.delete', $p->idpemilik) }}"
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
                                    <td colspan="6" class="text-center">Belum ada data pemilik</td>
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