@extends('layout.dashboard')

@section('title', 'Detail Rekam Medis')

@section('content')
<style>
.box{padding:25px;background:#fff;border-radius:12px;box-shadow:0 3px 8px rgba(0,0,0,0.1);}
.table th{background:#d633ff;color:#fff;}
.table tbody tr:hover{background:#f8e7ff;}
</style>

<div class="container">
<section class="box">
    <h3 class="fw-bold text-center mb-4">📑 Detail Rekam Medis</h3>

    <p><b>Tanggal:</b> {{ $rekam->created_at }}</p>
    <p><b>Hewan:</b> {{ $rekam->nama_pet }}</p>
    <p><b>Dokter:</b> {{ $rekam->dokter }}</p>

    <hr>

    <p><b>Anamnesa:</b> {{ $rekam->anamnesa }}</p>
    <p><b>Temuan Klinis:</b> {{ $rekam->temuan_klinis }}</p>
    <p><b>Diagnosa:</b> {{ $rekam->diagnosa }}</p>

    <hr>
    <h5><b>Daftar Tindakan / Terapi</b></h5>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Tindakan / Terapi</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $d)
            <tr>
                <td>{{ $d->kode }}</td>
                <td>{{ $d->deskripsi_tindakan_terapi }}</td>
                <td>{{ $d->detail }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('pemilik.rekam.index') }}" class="btn btn-secondary mt-2">⬅ Kembali</a>

</section>
</div>
@endsection
