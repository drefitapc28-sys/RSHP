@extends('layouts.lte.main')

@section('title', 'Role Pengguna | RSHP UNAIR')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        {{-- Breadcrumb --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Role Pengguna</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Role</li>
                </ol>
            </div>
        </div>

        {{-- Card --}}
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Role Pengguna</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.role.create') }}" 
                               class="btn btn-primary btn-sm">
                                + Tambah Role
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50px">No</th>
                                    <th>Nama Role</th>
                                    <th style="width: 150px">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($roles as $index => $role)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $role->nama_role }}</td>

                                    <td>
                                        <a href="{{ route('admin.role.edit', $role->idrole) }}"
                                           class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('admin.role.delete', $role->idrole) }}"
                                              method="POST"
                                              style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button 
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Hapus role ini?')">
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