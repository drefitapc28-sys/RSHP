@extends('layouts.lte.main')

@section('title', 'Manajemen User')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        {{-- Breadcrumb --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Manajemen User</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Manajemen User</li>
                </ol>
            </div>
        </div>

        {{-- Card Table --}}
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Manajemen User</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 60px" class="text-center">No</th>
                                    <th>Nama User</th>
                                    <th>Roles</th>
                                    <th style="width: 220px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $index => $user)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>

                                        <td>{{ $user->nama }}</td>

                                        <td>
                                            @if ($user->roles->isEmpty())
                                                <span class="badge bg-secondary">
                                                    Belum ada role
                                                </span>
                                            @else
                                                @foreach ($user->roles as $role)
                                                    <span class="badge {{ $role->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $role->nama_role }}
                                                        ({{ $role->status == 1 ? 'aktif' : 'nonaktif' }})
                                                    </span>
                                                @endforeach
                                            @endif
                                        </td>

                                        <td>
                                            {{-- Tambah Role --}}
                                            <a href="{{ route('admin.role_user.create', $user->iduser) }}"
                                               class="btn btn-sm btn-primary mb-1">
                                                <i class="bi bi-plus-circle"></i> Tambah Role
                                            </a>

                                            {{-- Edit & Hapus Role --}}
                                            @foreach ($user->roles as $role)
                                                <div class="d-flex gap-1 mb-1">
                                                    <a href="{{ route('admin.role_user.edit', $role->idrole_user) }}"
                                                       class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('admin.role_user.destroy', $role->idrole_user) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Yakin hapus role {{ $role->nama_role }}?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-sm btn-danger">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            Tidak ada data user
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        {{-- optional pagination --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
