@extends('layouts.lte.main')

@section('title', 'Daftar Pemilik Hewan')

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
.text-center {
    text-align: center;
    padding: 30px;
    color: #999;
}
.btn-back {
    background: #757575;
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    display: inline-block;
    margin: 15px 20px;
}
.btn-back:hover {
    background: #616161;
    color: white;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>🐾 Daftar Pemilik Hewan</h3>
    </div>

    <div class="card-body">
        @if(count($data) > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pemilik</th>
                        <th>Email</th>
                        <th>No WA</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $p)
                    <tr>
                        <td>{{ $p->idpemilik }}</td>
                        <td>{{ $p->nama_pemilik }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->no_wa }}</td>
                        <td>{{ $p->alamat }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Belum ada data pemilik hewan.</p>
        @endif
        
        <a href="{{ route('perawat.dashboard') }}" class="btn-back">⬅ Kembali</a>
    </div>
</div>

@endsection