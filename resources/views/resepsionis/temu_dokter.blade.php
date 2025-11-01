@extends('layout.dashboard')

@section('title', 'Daftar Temu Dokter')

@section('content')
<div class="container">
    <h2 class="text-center mb-3">Daftar Temu Dokter</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('resepsionis.temu-dokter.store') }}" class="p-4 border rounded bg-white">
        @csrf

        <label class="fw-bold">Pilih Pet</label>
        <select name="idpet" class="form-select mb-3" required>
            <option value="">-- Pilih Pet --</option>
            @foreach ($pets as $p)
                <option value="{{ $p->idpet }}">{{ $p->nama_pet }} (Pemilik: {{ $p->nama_pemilik }})</option>
            @endforeach
        </select>

        <label class="fw-bold">Pilih Dokter</label>
        <select name="idrole_user"> class="form-select mb-3" required>
            <option value="">-- Pilih Dokter --</option>
            @foreach ($dokters as $d)
            <option value="{{ $d->idrole_user }}">{{ $d->nama }}</option>
            @endforeach
        </select>

        <button class="btn btn-warning w-100">Daftar</button>
    </form>
</div>
@endsection
