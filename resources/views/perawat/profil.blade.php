@extends('layouts.lte.main')

@section('title', 'Profil Perawat')

@section('content')

<style>
.card {
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin: 20px;
}
.card-header {
    background: #3f51b5;
    color: white;
    padding: 15px 20px;
    border-radius: 8px 8px 0 0;
}
.card-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 500;
}
.card-body {
    padding: 25px;
}
.profile-item {
    display: flex;
    padding: 12px 0;
    border-bottom: 1px solid #f0f0f0;
    font-size: 14px;
}
.profile-item:last-child {
    border-bottom: none;
}
.profile-label {
    font-weight: 600;
    color: #333;
    min-width: 150px;
    flex-shrink: 0;
}
.profile-value {
    color: #555;
    flex: 1;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>👤 Profil Perawat</h3>
    </div>

    <div class="card-body">
        <div class="profile-item">
            <span class="profile-label">Nama:</span>
            <span class="profile-value">{{ $perawat->nama }}</span>
        </div>

        <div class="profile-item">
            <span class="profile-label">Email:</span>
            <span class="profile-value">{{ $perawat->email }}</span>
        </div>

        <div class="profile-item">
            <span class="profile-label">Alamat:</span>
            <span class="profile-value">{{ $perawat->alamat }}</span>
        </div>

        <div class="profile-item">
            <span class="profile-label">No Telp:</span>
            <span class="profile-value">{{ $perawat->no_hp }}</span>
        </div>

        <div class="profile-item">
            <span class="profile-label">Jenis Kelamin:</span>
            <span class="profile-value">{{ $perawat->jenis_kelamin }}</span>
        </div>
    </div>
</div>

@endsection