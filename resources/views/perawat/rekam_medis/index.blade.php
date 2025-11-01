@extends('layout.dashboard')

@section('title','Data Rekam Medis')

@section('content')
<div class="container">
    <h2 class="text-center mb-3">Data Rekam Medis</h2>
    <a href="{{ route('perawat.rekam-medis.create') }}" class="btn btn-primary mb-3">+ Tambah Rekam Medis</a>

    <table class="table table-bordered table-hover bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Dokter</th>
                <th>Hewan</th>
                <th>Pemilik</th>
                <th>Diagnosa</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($rekam as $r)
            <tr>
                <td>{{ $r->idrekam_medis }}</td>
                <td>{{ $r->created_at }}</td>
                <td>{{ $r->nama_dokter }}</td>
                <td>{{ $r->nama_pet }}</td>
                <td>{{ $r->nama_pemilik }}</td>
                <td>{{ $r->diagnosa }}</td>
                <td>
                    <a href="{{ route('perawat.rekam-medis.show', $r->idrekam_medis) }}" class="btn btn-primary btn-sm">Lihat Detail</a
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
