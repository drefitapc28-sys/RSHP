@extends('layouts.lte.main')

@section('title', 'Relasi Role User | RSHP UNAIR')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        {{-- Breadcrumb --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Relasi Role User</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Relasi Role User</li>
                </ol>
            </div>
        </div>

        {{-- Card --}}
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Relasi Role User</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.role-user.create') }}"
                               class="btn btn-primary btn-sm">
                                + Tambah Relasi
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th style="width:150px">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($roleUsers as $index => $ru)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $ru->nama_user }}</td>
                                    <td>{{ $ru->email_user }}</td>
                                    <td>{{ $ru->nama_role }}</td>
                                    <td>{{ $ru->status == 1 ? 'Aktif' : 'Nonaktif' }}</td>

                                    <td>
                                        <a href="{{ route('admin.role-user.edit', $ru->idrole_user) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.role-user.delete', $ru->idrole_user) }}"
                                              method="POST"
                                              style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Hapus relasi ini?')">
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
