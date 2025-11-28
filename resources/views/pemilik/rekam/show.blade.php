@extends('layouts.lte.main')

@section('title', 'Detail Rekam Medis')

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
    padding: 20px;
}
.info-group {
    margin-bottom: 15px;
}
.info-group p {
    margin: 8px 0;
    font-size: 14px;
    color: #555;
}
.info-group b {
    color: #333;
    font-weight: 600;
    display: inline-block;
    min-width: 150px;
}
.divider {
    border: 0;
    border-top: 1px solid #e0e0e0;
    margin: 20px 0;
}
.section-title {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
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
.btn-back {
    background: #757575;
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    display: inline-block;
    margin-top: 15px;
}
.btn-back:hover {
    background: #616161;
    color: white;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>📑 Detail Rekam Medis</h3>
    </div>

    <div class="card-body">
        <div class="info-group">
            <p><b>Tanggal:</b> {{ $rekam->created_at }}</p>
            <p><b>Hewan:</b> {{ $rekam->nama_pet }}</p>
            <p><b>Dokter:</b> {{ $rekam->dokter }}</p>
        </div>

        <hr class="divider">

        <div class="info-group">
            <p><b>Anamnesa:</b> {{ $rekam->anamnesa }}</p>
            <p><b>Temuan Klinis:</b> {{ $rekam->temuan_klinis }}</p>
            <p><b>Diagnosa:</b> {{ $rekam->diagnosa }}</p>
        </div>

        <hr class="divider">

        <h5 class="section-title">Daftar Tindakan / Terapi</h5>

        @if(count($details) > 0)
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Tindakan / Terapi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $index => $d)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $d->kode }}</td>
                        <td>{{ $d->deskripsi_tindakan_terapi }}</td>
                        <td>{{ $d->detail }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="color: #999; text-align: center; padding: 20px;">Tidak ada tindakan/terapi.</p>
        @endif

        <a href="{{ route('pemilik.rekam.index') }}" class="btn-back">⬅ Kembali</a>
    </div>
</div>

@endsection