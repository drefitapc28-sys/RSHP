@extends('layout.dashboard')

@section('title','Tambah Rekam Medis')

@section('content')
<div class="container">
    <h2 class="mb-3">Tambah Rekam Medis</h2>

    <form action="{{ route('perawat.rekam-medis.store') }}" method="POST">
        @csrf

        <label class="form-label">Reservasi Dokter</label>
        <select name="idreservasi_dokter" class="form-control" required>
            <option value="">-- Pilih Reservasi --</option>
            @foreach($reservasi as $r)
                <option value="{{ $r->idreservasi_dokter }}">
                    No Urut: {{ $r->no_urut }} | Pet: {{ $r->nama_pet }} | Dokter: {{ $r->nama_dokter }}
                </option>
            @endforeach
        </select>

        <label>Anamnesa</label>
        <textarea name="anamnesa" class="form-control" required></textarea>

        <label>Temuan Klinis</label>
        <textarea name="temuan_klinis" class="form-control" required></textarea>

        <label>Diagnosa</label>
        <textarea name="diagnosa" class="form-control" required></textarea>

        <button class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('perawat.rekam-medis.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>

</div>
@endsection
