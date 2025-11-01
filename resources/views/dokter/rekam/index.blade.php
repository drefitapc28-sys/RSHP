@extends('layout.dashboard')

@section('title','Daftar Rekam Medis Dokter')

@section('content')
<div class="container">

    <h2 class="text-center mb-3 fw-bold">Daftar Rekam Medis Pasien</h2>

    <table class="table table-bordered table-hover bg-white">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pemilik</th>
                <th>Nama Hewan</th>
                <th>Diagnosa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekam as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->created_at }}</td>
                <td>{{ $r->nama_pemilik }}</td>
                <td>{{ $r->nama_pet }}</td>
                <td>{{ $r->diagnosa ?? '-' }}</td>
                <td>
                    <a href="{{ route('dokter.rekam.show', $r->idrekam_medis) }}" class="btn btn-info btn-sm">
                        Detail & Tambah Terapi
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
