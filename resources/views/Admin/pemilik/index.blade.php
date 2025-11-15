@extends('layouts.lte.main')

@section('title', 'Data Pemilik Hewan | RSHP UNAIR')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        {{-- Breadcrumb --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Pemilik Hewan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Pemilik Hewan</li>
                </ol>
            </div>
        </div>

        {{-- Card Table --}}
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Pemilik Hewan</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.pemilik.create') }}" 
                               class="btn btn-primary btn-sm">+ Tambah Pemilik</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50px">No</th>
                                    <th>Nama Pemilik</th>
                                    <th>No. WhatsApp</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th style="width: 150px">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pemilik as $index => $row)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $row->user_nama }}</td>
                                    <td>{{ $row->no_wa }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->user_email }}</td>

                                    <td>
                                        <a href="{{ route('admin.pemilik.edit', $row->idpemilik) }}"
                                           class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('admin.pemilik.delete', $row->idpemilik) }}"
                                              method="POST"
                                              style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Hapus data ini?')">
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
