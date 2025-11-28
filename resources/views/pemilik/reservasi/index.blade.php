@extends('layouts.lte.main')

@section('title', 'Daftar Reservasi')

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
.status {
    font-weight: 600;
}
.status-selesai {
    color: #4caf50;
}
.status-menunggu {
    color: #ff9800;
}
.text-center {
    text-align: center;
    padding: 30px;
    color: #999;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>📋 Daftar Reservasi Hewan Saya</h3>
    </div>

    <div class="card-body">
        @if(count($reservasi) > 0)
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Urut</th>
                        <th>Nama Pet</th>
                        <th>Dokter Pemeriksa</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservasi as $index => $r)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $r->no_urut }}</td>
                        <td>{{ $r->nama_pet }}</td>
                        <td>{{ $r->nama_dokter }}</td>
                        <td>{{ $r->waktu_daftar }}</td>
                        <td class="status">
                            @if($r->status == 'Y')
                                <span class="status-selesai">✅ Selesai</span>
                            @elseif($r->status == 'N')
                                <span class="status-menunggu">⏳ Menunggu</span>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Belum ada reservasi untuk hewan Anda.</p>
        @endif
    </div>
</div>

@endsection