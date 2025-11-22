@extends('layout.dashboard')

@section('title', 'Profil Perawat')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Profil Perawat</h3>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $perawat->nama }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $perawat->email }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $perawat->alamat }}</td>
                    </tr>
                    <tr>
                        <th>No Telp</th>
                        <td>{{ $perawat->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $perawat->jenis_kelamin }}</td>
                    </tr>
                </table>

            </div>
        </div>

    </div>
</div>
@endsection

