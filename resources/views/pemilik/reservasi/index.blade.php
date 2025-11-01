@extends('layout.dashboard')

@section('title','Daftar Reservasi')

@section('content')

<style>
.container-box {
    max-width: 900px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

h2 { text-align:center; color:#333; margin-bottom:20px; }

table {
    width:100%;
    border-collapse:collapse;
    background:white;
    margin-top:10px;
}
th, td {
    border:1px solid #ccc;
    padding:10px;
    text-align:center;
}
th {
    background: #ff83b7;
    color:white;
}
tr:nth-child(even){
    background:#f9f9f9;
}
.status {
    font-weight:bold;
}
</style>

<div class="container-box">
    <h2>📋 Daftar Reservasi Hewan Saya</h2>

    <table>
        <thead>
            <tr>
                <th>No Urut</th>
                <th>Nama Pet</th>
                <th>Dokter Pemeriksa</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
        @if(count($reservasi) > 0)
            @foreach ($reservasi as $r)
            <tr>
                <td>{{ $r->no_urut }}</td>
                <td>{{ $r->nama_pet }}</td>
                <td>{{ $r->nama_dokter }}</td>
                <td>{{ $r->waktu_daftar }}</td>
                <td class="status">
                    @if($r->status == 'Y')
                        ✅ Selesai
                    @elseif($r->status == 'N')
                        ⏳ Menunggu
                    @else
                        - 
                    @endif
                </td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">Belum ada reservasi untuk hewan Anda.</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

@endsection
