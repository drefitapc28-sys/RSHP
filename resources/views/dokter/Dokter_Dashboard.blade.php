@extends('layout.dashboard')

@section('title','Dashboard Dokter | RSHP Universitas Airlangga')

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
    background: linear-gradient(135deg,#e74c3c,#ff7675);
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
    background:#e74c3c;
    color:#fff;
    font-weight:bold;
    border-radius:8px;
    text-align:center;
}
ul.menu li a:hover{
    background:#c0392b;
    text-decoration: none;
}
</style>

<div class="container">
<section class="section-box text-center">
    <h2 class="fw-bold">Halo, {{ $userName }} 👨‍⚕️</h2>
    <p class="text-muted">Selamat datang di Dashboard Dokter RSHP</p>

    <div class="stats">
        <div class="card-stat">
            <h4>{{ $jumlahRekamMedis }}</h4>
            <p>Total Rekam Medis</p>
        </div>
        <div class="card-stat">
            <h4>{{ $jumlahPemilik }}</h4>
            <p>Pemilik Hewan</p>
        </div>
        <div class="card-stat">
            <h4>{{ $jumlahPet }}</h4>
            <p>Hewan Terdaftar</p>
        </div>
    </div>

    <ul class="menu">
        <li><a href="{{ route('dokter.rekam.index') }}">Rekam Medis</a></li>
        <li><a href="{{ route('dokter.pemilik.index') }}">Data Pemilik</a></li>
        <li><a href="{{ route('dokter.pet.index') }}">Data Hewan</a></li>
        <li><a href="{{ route('dokter.profil') }}">Data Saya</a></li>
    </ul>
</section>
</div>
@endsection
