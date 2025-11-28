@extends('layouts.lte.main')

@section('title', 'Daftar Temu Dokter')

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
.alert {
    padding: 12px 15px;
    border-radius: 4px;
    margin-bottom: 20px;
    font-size: 14px;
}
.alert-success {
    background: #e8f5e9;
    color: #2e7d32;
    border: 1px solid #c8e6c9;
}
.form-group {
    margin-bottom: 20px;
}
.form-label {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    font-size: 14px;
}
.form-control {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    color: #555;
    transition: border-color 0.3s;
}
.form-control:focus {
    outline: none;
    border-color: #3f51b5;
    box-shadow: 0 0 0 3px rgba(63, 81, 181, 0.1);
}
select.form-control {
    cursor: pointer;
}
.btn-submit {
    width: 100%;
    padding: 10px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    background: #ffc107;
    color: #000;
    font-weight: 600;
    margin-top: 10px;
}
.btn-submit:hover {
    background: #ffb300;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>📅 Daftar Temu Dokter</h3>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('resepsionis.temu-dokter.store') }}">
            @csrf

            <div class="form-group">
                <label class="form-label">Pilih Pet</label>
                <select name="idpet" class="form-control" required>
                    <option value="">-- Pilih Pet --</option>
                    @foreach ($pets as $p)
                        <option value="{{ $p->idpet }}">{{ $p->nama_pet }} (Pemilik: {{ $p->nama_pemilik }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Pilih Dokter</label>
                <select name="idrole_user" class="form-control" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($dokters as $d)
                        <option value="{{ $d->idrole_user }}">{{ $d->nama }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-submit">✅ Daftar</button>
        </form>
    </div>
</div>

@endsection