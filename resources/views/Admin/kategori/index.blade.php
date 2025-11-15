@extends('layouts.lte.main')

@section('title', 'Kategori | RSHP Unair')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        {{-- Breadcrumb --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Kategori</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
                </ol>
            </div>
        </div>

        {{-- Card Table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Kategori</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary btn-sm">
                                + Tambah Kategori
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50px">No</th>
                                    <th>Nama Kategori</th>
                                    <th style="width: 150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td>
                                            <a href="{{ route('admin.kategori.edit', $item->idkategori) }}"
                                               class="btn btn-sm btn-warning">Edit</a>

                                            <form action="{{ route('admin.kategori.delete', $item->idkategori) }}"
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

                    <div class="card-footer clearfix">
                        {{-- Pagination bila diperlukan --}}
                        {{-- {{ $kategori->links() }} --}}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
