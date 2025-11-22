@extends('layouts.lte.main')

@section('title','Data Perawat')

@section('content')

<div class="container py-4">

    <a href="{{ route('admin.perawat.form') }}" class="btn btn-primary mb-3">+ Tambah Perawat</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-3 shadow">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Pendidikan</th>
                    <th>JK</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($perawat as $p)
                <tr>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->no_hp }}</td>
                    <td>{{ $p->pendidikan }}</td>
                    <td>{{ $p->jenis_kelamin }}</td>
                    <td>
                        <a href="{{ route('admin.perawat.edit', $p->id_perawat) }}" class="btn btn-warning btn-sm">Edit</a>

                        <a href="{{ route('admin.perawat.delete', $p->id_perawat) }}"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Hapus data ini?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
