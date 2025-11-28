@extends('layouts.lte.main')

@section('title', 'Dashboard Resepsionis')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')

{{-- Style khusus dashboard --}}
<style>
    .welcome-section { margin-top: 25px; }

    .welcome-card {
        background: linear-gradient(135deg, #3b82f6, #1e40af) !important;
        border: none !important;
    }

    .welcome-card h2,
    .welcome-card p {
        color: white !important;
    }

    .card-header {
        background: #3b82f6 !important;
        color: white !important;
    }

    /* samakan small-box admin */
    .small-box {
        border-radius: 8px;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    .small-box .icon {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 50px;
        opacity: .25;
    }

    .small-box .inner h3 {
        font-size: 32px;
        font-weight: bold;
    }

    .small-box .inner p {
        margin-bottom: 0;
        font-size: 16px;
    }
</style>

<!-- Welcome Section -->
<div class="row mb-4 welcome-section">
    <div class="col-12">
        <div class="card shadow-sm welcome-card" style="margin-left:10px; margin-right:10px;">
            <div class="card-body py-4">
                <h2 class="mb-1">Halo, {{ Auth::user()->nama ?? 'Resepsionis' }} 👋</h2>
                <p class="mb-0 text-light">Selamat datang di Sistem Manajemen Rumah Sakit Hewan.</p>
            </div>
        </div>
    </div>
</div>

<!-- Info Boxes -->
<div class="row px-2">

    <div class="col-lg-3 col-6 mb-3">
        <div class="small-box shadow-sm" style="background:#3b82f6;">
            <div class="inner text-white">
                <h3>{{ $jumlahPet ?? 0 }}</h3>
                <p>Total Hewan Terdaftar</p>
            </div>
            <div class="icon">
                <i class="bi bi-heart"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6 mb-3">
        <div class="small-box shadow-sm" style="background:#1e40af;">
            <div class="inner text-white">
                <h3>{{ $jumlahPemilik ?? 0 }}</h3>
                <p>Total Pemilik Hewan</p>
            </div>
            <div class="icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6 mb-3">
        <div class="small-box shadow-sm" style="background:#2563eb;">
            <div class="inner text-white">
                <h3>{{ $jumlahTemu ?? 0 }}</h3>
                <p>Total Temu Dokter</p>
            </div>
            <div class="icon">
                <i class="bi bi-calendar-check"></i>
            </div>
        </div>
    </div>

</div>

@endsection
