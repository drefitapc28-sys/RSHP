@extends('layouts.lte.main')

@section('title', 'Data User')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        {{-- Breadcrumb + Title --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Data User</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Data User</li>
                </ol>
            </div>
        </div>

        {{-- Card Table --}}
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Data User</h3>

                        <div class="card-tools">
                            <a href="{{ route('admin.user.create') }}"
                               class="btn btn-success btn-sm">
                                + Tambah User
                            </a>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width:120px">ID User</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th style="width:320px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->iduser }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $user->iduser) }}"
                                               class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.user.destroy', $user->iduser) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.user.resetPassword', $user->iduser) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Reset password menjadi 123456?')">
                                                @csrf
                                                <button type="submit"
                                                        class="btn btn-secondary btn-sm">
                                                    Reset Password
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            Belum ada data user
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix"></div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
