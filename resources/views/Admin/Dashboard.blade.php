@extends('layout.dashboard')

@section('title','Dashboard Data Master | RSHP Universitas Airlangga')

@section('content')
<style>
.section-box {
    padding: 30px;
    background: #ffffff;
    border-radius: 14px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.stats{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:15px;
    margin: 25px 0;
}

.card-stat {
    background: linear-gradient(135deg,#a8d8ff,#ffeaa7);
    color:#2d3436;
    padding:16px;
    width:165px;
    border-radius:12px;
    text-align:center;
    box-shadow:0 2px 6px rgba(0,0,0,0.1);
}
.card-stat h4 { font-size:22px; font-weight:700; margin:0; }
.card-stat p { margin:3px 0 0; font-size:13px; font-weight:600; color:#2d3436; }

ul.menu{
    list-style:none;
    padding:0;
    margin:25px auto;
    max-width:480px;
}
ul.menu li{
    margin:10px 0;
}
ul.menu li a{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:8px;
    text-decoration:none!important;
    padding:12px;
    background:linear-gradient(135deg,#74b9ff,#ffeaa7);
    color:#2d3436;
    font-weight:bold;
    border-radius:8px;
    border:1px solid #dcdcdc;
    transition:.2s;
}
ul.menu li a:hover{
    background:linear-gradient(135deg,#4aa3ff,#ffd86b);
    transform:translateY(-2px);
}
</style>

<div class="container">
<section class="section-box text-center">
    <h2 class="fw-bold">📊 Dashboard Data Master</h2>
    <p class="text-muted">Kelola Data Utama RSHP Universitas Airlangga</p>

    {{-- STAT --}}
    <div class="stats">

        <div class="card-stat"><h4>{{ $jumlahUser }}</h4><p>User</p></div>
        <div class="card-stat"><h4>{{ $jumlahRole }}</h4><p>Role</p></div>
        <div class="card-stat"><h4>{{ $jumlahPemilik }}</h4><p>Pemilik</p></div>
        <div class="card-stat"><h4>{{ $jumlahPet }}</h4><p>Pet</p></div>

        <div class="card-stat"><h4>{{ $jumlahJenis }}</h4><p>Jenis Hewan</p></div>
        <div class="card-stat"><h4>{{ $jumlahRas }}</h4><p>Ras Hewan</p></div>

        <div class="card-stat"><h4>{{ $jumlahKategori }}</h4><p>Kategori</p></div>
        <div class="card-stat"><h4>{{ $jumlahKategoriKlinis }}</h4><p>Kategori Klinis</p></div>
        <div class="card-stat"><h4>{{ $jumlahKodeTindakan }}</h4><p>Kode Tindakan</p></div>

    </div>

    {{-- MENU --}}
    <ul class="menu">
        <li><a href="{{ route('admin.role-user.index') }}">Data User</a></li>
        <li><a href="{{ route('admin.role.index') }}">Role</a></li>
        <li><a href="{{ route('admin.pemilik.index') }}">Pemilik Hewan</a></li>
        <li><a href="{{ route('admin.pet.index') }}">Data Pet</a></li>
        <li><a href="{{ route('admin.jenis-hewan.index') }}">Jenis Hewan</a></li>
        <li><a href="{{ route('admin.ras-hewan.index') }}"> Ras Hewan</a></li>
        <li><a href="{{ route('admin.kategori.index') }}"> Kategori Terapi</a></li>
        <li><a href="{{ route('admin.kategori-klinis.index') }}"> Kategori Klinis</a></li>
        <li><a href="{{ route('admin.kode-tindakan-terapi.index') }}"> Kode Tindakan Terapi</a></li>
    </ul>

</section>
</div>
@endsection
