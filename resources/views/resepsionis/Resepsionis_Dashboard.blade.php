@extends('layout.dashboard')

@section('title', 'Dashboard Resepsionis | RSHP Universitas Airlangga')

@section('content')
<style>
    section {
        padding: 25px;
        margin-top: 30px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #333;
        text-align: center;
        font-weight: 700;
    }
    .stats {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        margin: 20px 0;
    }
    .card-stat {
        background: linear-gradient(135deg, #1979ef, #74b9ff);
        color: white;
        padding: 20px;
        border-radius: 10px;
        width: 200px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    }
    .card-stat h4 {
        font-size: 20px;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .card-stat p {
        font-size: 14px;
        margin: 0;
    }
    ul.menu {
        list-style: none;
        padding: 0;
        margin: 30px auto;
        max-width: 400px;
    }
    ul.menu li {
        margin: 12px 0;
    }
    ul.menu li a {
        display: block;
        padding: 12px;
        text-align: center;
        background: #1979ef;
        color: white;
        font-weight: bold;
        border-radius: 8px;
        text-decoration: none;
        transition: background 0.2s ease-in-out;
    }
    ul.menu li a:hover {
        background: #0c53a7;
    }
</style>

<div class="container">
    <section>
        <h2>Halo, {{ $userName }} 👋</h2>
        <p class="text-center text-muted">Selamat datang di Dashboard Resepsionis RSHP Universitas Airlangga</p>

        {{-- Statistik singkat --}}
        <div class="stats">
            <div class="card-stat">
                <h4>{{ $jumlahPemilik }}</h4>
                <p>Total Pemilik</p>
            </div>
            <div class="card-stat">
                <h4>{{ $jumlahPet }}</h4>
                <p>Hewan Terdaftar</p>
            </div>
            <div class="card-stat">
                <h4>{{ $jumlahTemu }}</h4>
                <p>Temu Dokter</p>
            </div>
        </div>

        <p style="text-align:center; margin-top:25px;">Silakan pilih menu untuk mengelola data:</p>

        {{-- Menu Navigasi --}}
        <ul class="menu">
            <li><a href="{{ route('resepsionis.pemilik.index') }}"><class="btn btn-warning"> Data Pemilik</a></li>
            <li><a href="{{ route('resepsionis.pet.index') }}"> <class="btn btn-info"> Data Hewan</a></li>
            <li><a href="{{ route('resepsionis.temu-dokter') }}" class="btn btn-primary">Daftar Temu Dokter</a></li>
        </ul>
    </section>
</div>
@endsection
