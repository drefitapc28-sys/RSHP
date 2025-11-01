@extends('layout.dashboard')

@section('title','Dashboard Pemilik')

@section('content')
<style>
.section-box {
    padding: 30px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

/* Card Statistik */
.stats{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:15px;
    margin: 25px 0;
}
.card-stat {
    background: linear-gradient(135deg,#ff85c1,#b983ff);
    color: #fff;
    padding:18px;
    width:200px;
    border-radius:12px;
    text-align:center;
    box-shadow:0 2px 8px rgba(0,0,0,0.15);
}
.card-stat h4 { 
    font-size:22px; 
    font-weight:700; 
    margin:0; 
}
.card-stat p { 
    margin:3px 0 0; 
    font-size:14px; 
}

/* Menu Button */
ul.menu {list-style:none;padding:0;margin:25px auto;max-width:380px;}
ul.menu li{margin:10px 0;}
ul.menu li a{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px;
    text-decoration: none !important;
    background: linear-gradient(135deg,#ff83b7,#b26cff);
    color:#fff;
    font-weight:bold;
    border-radius:8px;
    transition:0.3s;
}
ul.menu li a:hover{
    background: linear-gradient(135deg,#ff4fa0,#923cff);
    text-decoration: none;
    transform: translateY(-2px);
}
</style>


<div class="container text-center mt-4">

<h2 class="fw-bold">Halo, {{ $userName }} 👋</h2>
<p class="text-muted mb-4">Selamat datang di Dashboard Pemilik RSHP</p>

<div class="stats">
    <div class="card-stat">
        <h4>{{ $jumlahPet }}</h4>
        <p>Hewan Saya</p>
    </div>
    <div class="card-stat">
        <h4>{{ $jumlahReservasi }}</h4>
        <p>Reservasi</p>
    </div>
    <div class="card-stat">
        <h4>{{ $jumlahRekam }}</h4>
        <p>Rekam Medis</p>
    </div>
</div>

<ul class="menu">
    <li><a href="{{ route('pemilik.pet.index') }}"> Daftar Pet</a></li>
    <li><a href="{{ route('pemilik.reservasi.index') }}"> Daftar Reservasi</a></li>
    <li><a href="{{ route('pemilik.rekam.index') }}"> Daftar Rekam Medis</a></li>
</ul>

</div>
@endsection
