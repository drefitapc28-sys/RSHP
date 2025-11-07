@extends('layout.dashboard')

@section('title', 'Daftar Pemilik Hewan')

@section('content')
<div class="container mt-4">

    <h3 class="fw-bold text-purple mb-3">🐾Daftar Pemilik Hewan</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover">
                <thead class="table-purple text-white">
                    <tr>
                        <th>id</th>
                        <th>Nama Pemilik</th>
                        <th>Email</th>
                        <th>No WA</th>
                        <th>Alamat</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($data as $p)
                <tr>
                    <td>{{ $p->idpemilik }}</td>
                    <td>{{ $p->nama_pemilik }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->no_wa }}</td>
                    <td>{{ $p->alamat }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">Belum ada data</td></tr>
                @endforelse
                </tbody>
            </table>

            <a href="{{ route('resepsionis.dashboard') }}" class="btn btn-secondary mt-2">
                ⬅ Kembali
            </a>

        </div>
    </div>
</div>
@endsection

