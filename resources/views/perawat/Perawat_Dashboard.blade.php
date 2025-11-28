@extends('layouts.lte.main')

@section('title', 'Dashboard Perawat')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Dashboard Perawat</li>
@endsection

@section('content')

<style>
    .welcome-section { margin-top: 25px; }

    .welcome-card {
        background: linear-gradient(135deg, #1d4ed8, #1e3a8a) !important;
        border: none !important;
    }

    .welcome-card h2,
    .welcome-card p {
        color: white !important;
    }

    /* small-box AdminLTE biru */
    .small-box {
        border-radius: 8px;
        padding: 20px;
        position: relative;
        overflow: hidden;
        color: white !important;
        background: #1d4ed8 !important; /* biru utama */
    }

    .small-box .icon {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 48px;
        opacity: .25;
    }

    .menu-box a {
        display: block;
        width: 100%;
        padding: 12px;
        background: #1d4ed8;
        color: #fff !important;
        text-align: center;
        border-radius: 8px;
        font-weight: bold;
        margin-bottom: 10px;
        text-decoration: none;
    }

    .menu-box a:hover {
        background: #183a9c;
    }
</style>

<!-- Welcome -->
<div class="row mb-4 welcome-section">
    <div class="col-12">
        <div class="card shadow-sm welcome-card" style="margin-left:10px; margin-right:10px;">
            <div class="card-body py-4">
                <h2 class="mb-1">Halo, {{ $userName }} 👩‍⚕️</h2>
                <p class="mb-0 text-light">Selamat datang di Dashboard Perawat RSHP</p>
            </div>
        </div>
    </div>
</div>

<!-- Statistik -->
<div class="row px-2">

    <div class="col-lg-3 col-6 mb-3">
        <div class="small-box shadow-sm">
            <div class="inner">
                <h3>{{ $jumlahPemilik ?? 0 }}</h3>
                <p>Total Pemilik</p>
            </div>
            <div class="icon">
                <i class="bi bi-people-fill"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6 mb-3">
        <div class="small-box shadow-sm">
            <div class="inner">
                <h3>{{ $jumlahPet ?? 0 }}</h3>
                <p>Hewan Terdaftar</p>
            </div>
            <div class="icon">
                <i class="bi bi-bag-heart"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6 mb-3">
        <div class="small-box shadow-sm">
            <div class="inner">
                <h3>{{ $jumlahRekamMedis ?? 0 }}</h3>
                <p>Rekam Medis</p>
            </div>
            <div class="icon">
                <i class="bi bi-journal-medical"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6 mb-3">
        <div class="small-box shadow-sm">
            <div class="inner">
                <h3>{{ $jumlahTemu ?? 0 }}</h3>
                <p>Temu Dokter</p>
            </div>
            <div class="icon">
                <i class="bi bi-calendar-check"></i>
            </div>
        </div>
    </div>

</div>

@endsection
