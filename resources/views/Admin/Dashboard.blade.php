@extends('layouts.lte.main')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')

{{-- Style khusus dashboard --}}
<style>
    /* Tambah jarak antara header dan "Halo Admin" */
    .welcome-section {
        margin-top: 25px;
    }

    /* Warna tema biru → kuning */
    .welcome-card {
        background: linear-gradient(135deg, #1d4ed8, #1e3a8a) !important; /* biru gelap */
        border: none !important;
    }

    .welcome-card h2,
    .welcome-card p {
        color: white !important;
    }

    /* Card header disesuaikan dengan warna tema */
    .card-header {
        background: #1d4ed8 !important; 
        color: white !important;
    }
</style>

<!-- Welcome Section -->
<div class="row mb-4 welcome-section">
    <div class="col-12">
        <div class="card shadow-sm welcome-card" style="margin-left:10px; margin-right:10px;">
            <div class="card-body py-4">
                <h2 class="mb-1">Halo, {{ Auth::user()->nama ?? 'Admin' }} 👋</h2>
                <p class="mb-0 text-light">Selamat datang di Sistem Manajemen Rumah Sakit Hewan.</p>
            </div>
        </div>
    </div>
</div>

<!-- Info Boxes -->
<div class="row px-2">

    <div class="col-lg-3 col-6 mb-3">
        <div class="small-box shadow-sm" style="background:#1d4ed8;">
            <div class="inner text-white">
                <h3>{{ $jumlahPet ?? 0 }}</h3>
                <p>Total Hewan Terdaftar</p>
            </div>
            <div class="icon">
                <i class="fas fa-paw"></i>
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
                <i class="fas fa-user-friends"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6 mb-3">
        <div class="small-box shadow-sm" style="background:#facc15;">
            <div class="inner text-dark">
                <h3>{{ $jumlahJenis ?? 0 }}</h3>
                <p>Jenis Hewan</p>
            </div>
            <div class="icon">
                <i class="fas fa-dog text-dark"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6 mb-3">
        <div class="small-box shadow-sm" style="background:#e11d48;">
            <div class="inner text-white">
                <h3>{{ $jumlahKategori ?? 0 }}</h3>
                <p>Kategori Hewan</p>
            </div>
            <div class="icon">
                <i class="fas fa-tags"></i>
            </div>
        </div>
    </div>

</div>

<!-- Additional Panels -->
<div class="row px-2">

    <!-- Informasi Sistem -->
    <div class="col-md-4 mb-3">
        <div class="card card-outline shadow-sm" style="min-height: 240px;">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-info-circle mr-2"></i> Informasi Sistem</h3>
            </div>
            <div class="card-body">
                <p>Sistem ini digunakan untuk mengelola berbagai data transaksi pada Rumah Sakit Hewan Pendidikan Universitas Airlangga.</p>

                <ul class="mb-0">
                    <li>Manajemen Hewan</li>
                    <li>Manajemen Pemilik</li>
                    <li>Pengelolaan Kategori Hewan</li>
                    <li>Pengelolaan Jenis Hewan</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Pengumuman -->
    <div class="col-md-4 mb-3">
        <div class="card card-outline shadow-sm" style="min-height: 240px;">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-bullhorn mr-2"></i> Pengumuman</h3>
            </div>
            <div class="card-body">
                <p>Tidak ada pengumuman terbaru.</p>
                <p class="mb-0 text-muted">Semua sistem berjalan normal.</p>
            </div>
        </div>
    </div>

    <!-- Aktivitas Terakhir -->
    <div class="col-md-4 mb-3">
        <div class="card card-outline shadow-sm" style="min-height: 240px;">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-history mr-2"></i> Aktivitas Terakhir</h3>
            </div>
            <div class="card-body">
                <p>Terakhir login:</p>
                <h5 class="text-primary">{{ now()->format('d M Y, H:i') }}</h5>
                <hr>
                <p class="text-muted mb-0">Pantau aktivitas admin lainnya pada halaman log.</p>
            </div>
        </div>
    </div>

</div>

@endsection
