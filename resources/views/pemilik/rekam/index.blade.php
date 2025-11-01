@extends('layout.dashboard')

@section('title', 'Rekam Medis')

@section('content')
<style>
.page-box{padding:25px;background:#fff;border-radius:12px;box-shadow:0 3px 8px rgba(0,0,0,0.1);}
.table th{background:#ff64b4;color:#fff;}
.table tbody tr:hover{background:#ffe3f1;}
a.btn-view{background:#d633ff;color:#fff;padding:5px 10px;border-radius:6px;}
a.btn-view:hover{background:#b800d8;}
</style>

<div class="container">
<section class="page-box">
    <h3 class="fw-bold text-center mb-3">📋 Rekam Medis Hewan</h3>

    <table class="table table-bordered table-striped align-middle">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Hewan</th>
                <th>Dokter</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekam as $r)
            <tr>
                <td>{{ $r->created_at }}</td>
                <td>{{ $r->nama_pet }}</td>
                <td>{{ $r->nama_dokter }}</td>
                <td>
                    <a class="btn-view" href="{{ route('pemilik.rekam.show',$r->idrekam_medis) }}">Lihat Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>
</div>
@endsection
