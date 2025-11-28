@extends('layouts.lte.main')

@section('title', 'Tambah Rekam Medis')

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
textarea.form-control {
    min-height: 100px;
    resize: vertical;
}
select.form-control {
    cursor: pointer;
}
.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    text-decoration: none;
    display: inline-block;
    margin-right: 8px;
}
.btn-success {
    background: #4caf50;
    color: white;
}
.btn-success:hover {
    background: #45a049;
}
.btn-secondary {
    background: #757575;
    color: white;
}
.btn-secondary:hover {
    background: #616161;
    color: white;
}
.form-actions {
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid #e0e0e0;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>📝 Tambah Rekam Medis</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('perawat.rekam-medis.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Reservasi Dokter</label>
                <select name="idreservasi_dokter" class="form-control" required>
                    <option value="">-- Pilih Reservasi --</option>
                    @foreach($reservasi as $r)
                        <option value="{{ $r->idreservasi_dokter }}">
                            No Urut: {{ $r->no_urut }} | Pet: {{ $r->nama_pet }} | Dokter: {{ $r->nama_dokter }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Anamnesa</label>
                <textarea name="anamnesa" class="form-control" placeholder="Masukkan anamnesa..." required></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Temuan Klinis</label>
                <textarea name="temuan_klinis" class="form-control" placeholder="Masukkan temuan klinis..." required></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Diagnosa</label>
                <textarea name="diagnosa" class="form-control" placeholder="Masukkan diagnosa..." required></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">💾 Simpan</button>
                <a href="{{ route('perawat.rekam-medis.index') }}" class="btn btn-secondary">✖ Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection