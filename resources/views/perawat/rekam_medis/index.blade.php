@extends('layouts.lte.main')

@section('title', 'Data Rekam Medis')

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
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.card-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 500;
}
.btn-add {
    background: #5c6bc0;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    text-decoration: none;
}
.btn-add:hover {
    background: #7986cb;
    color: white;
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
.btn-view {
    background: #2196f3;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 13px;
}
.btn-view:hover {
    background: #1976d2;
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
        <h3>📋 Data Rekam Medis</h3>
        <a href="{{ route('perawat.rekam-medis.create') }}" class="btn-add">+ Tambah Rekam Medis</a>
    </div>

    <div class="card-body">
        @if(count($rekam) > 0)
            <table>
                <thead>
                    <tr>
                        <th>No</th>
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
                    @foreach($rekam as $index => $r)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $r->idrekam_medis }}</td>
                        <td>{{ $r->created_at }}</td>
                        <td>{{ $r->nama_dokter }}</td>
                        <td>{{ $r->nama_pet }}</td>
                        <td>{{ $r->nama_pemilik }}</td>
                        <td>{{ $r->diagnosa }}</td>
                        <td>
                            <a href="{{ route('perawat.rekam-medis.show', $r->idrekam_medis) }}" class="btn-view">Lihat Detail</a>
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