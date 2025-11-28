@extends('layouts.lte.main')

@section('title', 'Daftar Rekam Medis Dokter')

@section('content')

<style>
.card {
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin: 20px;
}
.card-header {
    background: #3f51b5;
    color: white;
    padding: 15px 20px;
    border-radius: 8px 8px 0 0;
}
.card-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 500;
}
.card-body {
    padding: 0;
}
table {
    width: 100%;
    border-collapse: collapse;
}
thead {
    background: #f5f5f5;
    border-bottom: 2px solid #e0e0e0;
}
th {
    padding: 12px 15px;
    text-align: left;
    font-weight: 600;
    color: #333;
    font-size: 14px;
}
td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
    font-size: 14px;
    color: #555;
}
tbody tr:hover {
    background: #f9f9f9;
}
.btn-detail {
    background: #00bcd4;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 13px;
    white-space: nowrap;
}
.btn-detail:hover {
    background: #00acc1;
    color: white;
}
.text-center {
    text-align: center;
    padding: 30px;
    color: #999;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>📋 Daftar Rekam Medis Pasien</h3>
    </div>

    <div class="card-body">
        @if(count($rekam) > 0)
            <table>
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
                            <a href="{{ route('dokter.rekam.show', $r->idrekam_medis) }}" class="btn-detail">
                                Detail & Tambah Terapi
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Belum ada data rekam medis.</p>
        @endif
    </div>
</div>

@endsection