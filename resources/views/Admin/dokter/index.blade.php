@extends('layouts.lte.main')

@section('title','Data Dokter')

@section('content')

<div class="container py-4">

    <a href="{{ route('admin.dokter.form') }}" class="btn btn-primary mb-3">+ Tambah Dokter</a>

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
                    <th>Bidang</th>
                    <th>JK</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dokter as $d)
                <tr>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->no_hp }}</td>
                    <td>{{ $d->bidang_dokter }}</td>
                    <td>{{ $d->jenis_kelamin }}</td>
                    <td>
                        <a href="{{ route('admin.dokter.edit', $d->id_dokter) }}" class="btn btn-warning btn-sm">Edit</a>

                        <a href="{{ route('admin.dokter.delete', $d->id_dokter) }}"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
