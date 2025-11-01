@extends('layout.dashboard')

@section('title', 'Dashboard Perawat | RSHP Universitas Airlangga')

@section('content')
<style>
.section-box {
    padding: 30px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}
.stats{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:15px;
    margin: 25px 0;
}
.card-stat {
    background: linear-gradient(135deg,#00b894,#55efc4);
    color: #fff;
    padding:18px;
    width:200px;
    border-radius:12px;
    text-align:center;
    box-shadow:0 2px 5px rgba(0,0,0,0.15);
}
.card-stat h4 { font-size:22px; font-weight:700; margin:0; }
.card-stat p { margin:3px 0 0; font-size:14px; }
ul.menu{list-style:none;padding:0;margin:25px auto;max-width:380px;}
ul.menu li{margin:10px 0;}
ul.menu li a{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none !important;
    padding: 12px;
    background:#00b894;
    color:#fff;
    font-weight:bold;
    border-radius:8px;
    text-align:center;
}
ul.menu li a:hover{
    background:#019165;
    text-decoration: none;
}
</style>

<div class="container">
<section class="section-box">
    <h2 class="text-center fw-bold">Halo, {{ $userName }} 👩‍⚕️</h2>
    <p class="text-center text-muted">Selamat datang di Dashboard Perawat RSHP</p>

    {{-- Statistik --}}
    <div class="stats">
        <div class="card-stat">
            <h4>{{ $jumlahPemilik }}</h4>
            <p>Pemilik</p>
        </div>
        <div class="card-stat">
            <h4>{{ $jumlahPet }}</h4>
            <p>Hewan Terdaftar</p>
        </div>
        <div class="card-stat">
            <h4>{{ $jumlahRekamMedis }}</h4>
            <p>Rekam Medis</p>
        </div>
        <div class="card-stat">
            <h4>{{ $jumlahTemu }}</h4>
            <p>Temu Dokter</p>
        </div>
    </div>

    {{-- Menu --}}
    <ul class="menu">
        <li><a href="{{ route('perawat.rekam-medis.index') }}"> Kelola Rekam Medis</a></li>
        <li><a href="{{ route('perawat.pet') }}"> Data Hewan</a></li>
        <li><a href="{{ route('perawat.pemilik') }}"> Data Pemilik</a></li>
    </ul>
</section>
</div>
@endsection
