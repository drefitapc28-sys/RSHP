@extends('layouts.lte.main')

@section('title', 'Data Jenis Hewan | RSHP Unair')

@section('content')

<div class="app-content">
    <div class="container-fluid">

        {{-- Breadcrumb --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Jenis Hewan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Jenis Hewan</li>
                </ol>
            </div>
        </div>

        {{-- Card Table --}}
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Jenis Hewan</h3>

                        <div class="card-tools">
                            <a href="{{ route('admin.jenis-hewan.create') }}" class="btn btn-primary btn-sm">
                                + Tambah Jenis Hewan
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50px">No</th>
                                    <th>Nama Jenis Hewan</th>
                                    <th style="width: 150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenisHewan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_jenis_hewan }}</td>
                                    <td>
                                        <a href="{{ route('admin.jenis-hewan.edit', $item->idjenis_hewan) }}"
                                           class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('admin.jenis-hewan.delete', $item->idjenis_hewan) }}"
                                              method="POST"
                                              style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Apakah yakin ingin menghapus?')"
                                                    class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection