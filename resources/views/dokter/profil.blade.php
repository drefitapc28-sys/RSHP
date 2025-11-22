@extends('layout.dashboard')

@section('title', 'Profil Dokter | RSHP UNAIR')

@section('content')

<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0 fw-bold">Profil Dokter</h3>
        </div>

        <div class="card-body">

            @if ($dokter)
                <table class="table table-striped">
                    <tr>
                        <th style="width: 30%">Nama</th>
                        <td>{{ $dokter->nama }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $dokter->email }}</td>
                    </tr>

                    <tr>
                        <th>Alamat</th>
                        <td>{{ $dokter->alamat }}</td>
                    </tr>

                    <tr>
                        <th>No. HP</th>
                        <td>{{ $dokter->no_hp }}</td>
                    </tr>

                    <tr>
                        <th>Bidang Dokter</th>
                        <td>{{ $dokter->bidang_dokter }}</td>
                    </tr>

                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                            {{ $dokter->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>
                    </tr>
                </table>
            @else
                <div class="alert alert-warning text-center">
                    Data profil dokter belum dilengkapi oleh admin.
                </div>
            @endif

        </div>
    </div>
</div>

@endsection
