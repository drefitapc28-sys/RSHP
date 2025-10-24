@extends('layout.dashboard')

@section('title', 'Data Master | RSHP Universitas Airlangga')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-lg border-0 rounded-4 p-4">
        <h2 class="text-gradient fw-bold text-center mb-4">📘 Menu Data Master RSHP</h2>

        {{-- Statistik Data Master --}}
        <div class="row text-center mb-4">
            <div class="col-md-3 mb-3">
                <div class="card card-stat bg-warning bg-opacity-75 border-0 shadow-sm p-3">
                    <h5>👥 User</h5>
                    <h3 class="fw-bold">{{ $jumlahUser }}</h3>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-stat bg-secondary bg-opacity-25 border-0 shadow-sm p-3">
                    <h5>🧩 Role</h5>
                    <h3 class="fw-bold">{{ $jumlahRole }}</h3>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-stat bg-success bg-opacity-25 border-0 shadow-sm p-3">
                    <h5>🐾 Jenis Hewan</h5>
                    <h3 class="fw-bold">{{ $jumlahJenis }}</h3>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-stat bg-info bg-opacity-25 border-0 shadow-sm p-3">
                    <h5>🐕 Ras Hewan</h5>
                    <h3 class="fw-bold">{{ $jumlahRas }}</h3>
                </div>
            </div>
        </div>

        <div class="row text-center mb-4">
            <div class="col-md-3 mb-3">
                <div class="card card-stat bg-primary bg-opacity-25 border-0 shadow-sm p-3">
                    <h5>👩 Pemilik</h5>
                    <h3 class="fw-bold">{{ $jumlahPemilik }}</h3>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-stat bg-light border-0 shadow-sm p-3">
                    <h5>🐶 Pet</h5>
                    <h3 class="fw-bold">{{ $jumlahPet }}</h3>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-stat bg-danger bg-opacity-25 border-0 shadow-sm p-3">
                    <h5>📘 Kategori</h5>
                    <h3 class="fw-bold">{{ $jumlahKategori }}</h3>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-stat bg-pink bg-opacity-25 border-0 shadow-sm p-3">
                    <h5>🧬 Kategori Klinis</h5>
                    <h3 class="fw-bold">{{ $jumlahKategoriKlinis }}</h3>
                </div>
            </div>
        </div>

        <div class="row text-center mb-4 justify-content-center">
            <div class="col-md-4 mb-3">
                <div class="card card-stat bg-warning bg-opacity-25 border-0 shadow-sm p-3">
                    <h5>💊 Kode Tindakan Terapi</h5>
                    <h3 class="fw-bold">{{ $jumlahKodeTindakan }}</h3>
                </div>
            </div>
        </div>

        {{-- Navigasi Akses Cepat --}}
        <div class="mt-4 text-center">
            <h5 class="fw-semibold mb-3 text-secondary">⚙️ Akses Cepat ke Data Master</h5>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('admin.role-user') }}" class="btn btn-outline-dark">👥 Data User</a>
                <a href="{{ route('admin.role.index') }}" class="btn btn-outline-warning">🧩 Manajemen Role</a>
                <a href="{{ route('admin.jenis-hewan') }}" class="btn btn-outline-success">🐾 Jenis Hewan</a>
                <a href="{{ route('admin.ras-hewan') }}" class="btn btn-outline-info">🐕 Ras Hewan</a>
                <a href="{{ route('admin.pemilik') }}" class="btn btn-outline-primary">👩 Pemilik</a>
                <a href="{{ route('admin.pet') }}" class="btn btn-outline-success">🐶 Data Pet</a>
                <a href="{{ route('admin.kategori') }}" class="btn btn-outline-danger">📘 Kategori</a>
                <a href="{{ route('admin.kategori-klinis') }}" class="btn btn-outline-pink">🧬 Kategori Klinis</a>
                <a href="{{ route('admin.kode-tindakan-terapi') }}" class="btn btn-outline-warning">💊 Kode Tindakan Terapi</a>
            </div>
        </div>
    </div>
</div>

{{-- CSS tambahan --}}
<style>
    .card-stat {
        transition: transform 0.2s ease, box-shadow 0.3s ease;
        border-radius: 15px;
    }
    .card-stat:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .btn-outline-pink {
        border-color: #e83e8c;
        color: #e83e8c;
    }
    .btn-outline-pink:hover {
        background-color: #e83e8c;
        color: #fff;
    }
</style>
@endsection
