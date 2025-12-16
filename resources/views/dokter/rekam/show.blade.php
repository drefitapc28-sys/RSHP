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
.text-center {
    text-align: center;
    padding: 20px;
    color: #999;
}
.form-group {
    margin-bottom: 15px;
}
.form-label {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    font-size: 14px;
}
.form-control {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    color: #555;
    transition: border-color 0.3s;
}
.form-control:focus {
    outline: none;
    border-color: #3f51b5;
    box-shadow: 0 0 0 3px rgba(63, 81, 181, 0.1);
}
textarea.form-control {
    min-height: 80px;
    resize: vertical;
}
select.form-control {
    cursor: pointer;
}
.btn-success {
    background: #4caf50;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}
.btn-success:hover {
    background: #45a049;
}
.btn-back {
    background: #757575;
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    display: inline-block;
    margin-top: 10px;
}
.btn-back:hover {
    background: #616161;
    color: white;
}
.status-completed {
    background: #d4edda;
    color: #155724;
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 15px;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>📑 Detail Rekam Medis</h3>
    </div>

    <div class="card-body">
        @if($rekam->diagnosa && $rekam->diagnosa != '-')
            <div class="status-completed">✓ Rekam Medis Sudah Selesai</div>
        @endif

        <div class="info-group">
            <p><b>ID:</b> {{ $rekam->idrekam_medis }}</p>
            <p><b>Tanggal:</b> {{ $rekam->created_at }}</p>
            <p><b>Hewan:</b> {{ $rekam->nama_pet }}</p>
            <p><b>Pemilik:</b> {{ $rekam->nama_pemilik }}</p>
        </div>

        <hr class="divider">

        <div class="info-group">
            <p><b>Anamnesa:</b> {{ $rekam->anamnesa }}</p>
            <p><b>Temuan Klinis:</b> {{ $rekam->temuan_klinis }}</p>
            <p><b>Diagnosa:</b> {{ $rekam->diagnosa }}</p>
        </div>

        <hr class="divider">

        <h5 class="section-title">Daftar Tindakan / Terapi</h5>

        @if(count($detail) > 0)
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Deskripsi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detail as $index => $d)
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
            <p class="text-center">Belum ada tindakan/terapi.</p>
        @endif

        @if(!$rekam->diagnosa || $rekam->diagnosa == '-')
            <hr class="divider">

            <h5 class="section-title">Tambah Tindakan / Terapi</h5>

            <form action="{{ route('dokter.rekam.addTerapi', $rekam->idrekam_medis) }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-label">Kode Tindakan</label>
                    <select name="idkode_tindakan_terapi" class="form-control" required>
                        <option value="">-- Pilih Kode --</option>
                        @foreach($kode as $k)
                            <option value="{{ $k->idkode_tindakan_terapi }}">{{ $k->kode }} - {{ $k->deskripsi_tindakan_terapi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Detail</label>
                    <textarea name="detail" class="form-control" placeholder="Masukkan detail tindakan/terapi..."></textarea>
                </div>

                <button type="submit" class="btn-success">💾 Tambah Terapi</button>
            </form>
        @endif

        <a href="{{ route('dokter.rekam.index') }}" class="btn-back">⬅ Kembali</a>
    </div>
</div>

@endsection