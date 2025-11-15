@extends('layouts.lte.main')

@section('title', 'Kode Tindakan | RSHP Unair')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        {{-- Breadcrumb --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Kode Tindakan Terapi</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Kode Tindakan Terapi</li>
                </ol>
            </div>
        </div>

        {{-- Card Table --}}
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Kode Tindakan Terapi</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.kode-tindakan-terapi.create') }}" 
                               class="btn btn-primary btn-sm">
                                + Tambah Kode Tindakan
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50px">No</th>
                                    <th>Kode</th>
                                    <th>Nama Tindakan Terapi</th>
                                    <th>Kategori</th>
                                    <th>Kategori Klinis</th>
                                    <th style="width: 150px">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($kodeTindakan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->deskripsi_tindakan_terapi }}</td>
                                    <td>{{ $item->nama_kategori }}</td>
                                    <td>{{ $item->nama_kategori_klinis }}</td>

                                    <td>
                                        <a href="{{ route('admin.kode-tindakan-terapi.edit', $item->idkode_tindakan_terapi) }}"
                                           class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('admin.kode-tindakan-terapi.delete', $item->idkode_tindakan_terapi) }}"
                                              method="POST"
                                              style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
