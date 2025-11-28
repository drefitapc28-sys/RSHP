@extends('layouts.lte.main')

@section('title','Detail Rekam Medis')

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
/* area info di atas tabel */
.info {
    padding: 15px 20px;
    font-size: 14px;
    color: #444;
}
.info p { margin: 6px 0; }

/* tabel style seperti contoh daftar */
.table-wrapper {
    padding: 0 20px 20px 20px; /* jarak antara header/info dan tabel */
}
table.custom-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 8px;
}
table.custom-table thead {
    background: #f5f5f5;
    border-bottom: 2px solid #e0e0e0;
}
table.custom-table th {
    padding: 12px 15px;
    text-align: left;
    font-weight: 600;
    color: #333;
    font-size: 14px;
}
table.custom-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
    font-size: 14px;
    color: #555;
}
table.custom-table tbody tr:hover {
    background: #f9f9f9;
}
.form-area {
    padding: 0 20px 20px 20px;
}
</style>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Rekam Medis</h3>
        </div>

        <div class="card-body">
            <div class="info">
                <p><b>ID:</b> {{ $rekam->idrekam_medis }}</p>
                <p><b>Tanggal:</b> {{ $rekam->created_at }}</p>
                <p><b>Hewan:</b> {{ $rekam->nama_pet }}</p>
                <p><b>Pemilik:</b> {{ $rekam->nama_pemilik }}</p>
                <p><b>Anamnesa:</b> {{ $rekam->anamnesa }}</p>
                <p><b>Temuan Klinis:</b> {{ $rekam->temuan_klinis }}</p>
                <p><b>Diagnosa:</b> {{ $rekam->diagnosa }}</p>
            </div>

            <hr style="margin:0;">

            <div class="table-wrapper">
                <h5 style="margin:12px 0 8px 0">Tindakan / Terapi</h5>

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Deskripsi</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail as $d)
                        <tr>
                            <td>{{ $d->kode }}</td>
                            <td>{{ $d->deskripsi_tindakan_terapi }}</td>
                            <td>{{ $d->detail }}</td>
                        </tr>
                        @endforeach
                        @if(count($detail) == 0)
                        <tr>
                            <td colspan="3" class="text-center" style="padding:12px 15px;color:#999">Belum ada tindakan/terapi.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="form-area">
                <form action="{{ route('dokter.rekam.addTerapi', $rekam->idrekam_medis) }}" method="post" class="mt-3">
                    @csrf
                    <div class="form-group">
                        <label>Kode Tindakan:</label>
                        <select name="idkode_tindakan_terapi" class="form-control form-control-sm mb-2" required>
                            <option value="">-- Pilih Kode --</option>
                            @foreach($kode as $k)
                            <option value="{{ $k->idkode_tindakan_terapi }}">{{ $k->kode }} - {{ $k->deskripsi_tindakan_terapi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Detail:</label>
                        <textarea name="detail" class="form-control form-control-sm mb-2"></textarea>
                    </div>

                    <button class="btn btn-success btn-sm">Tambah Terapi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection