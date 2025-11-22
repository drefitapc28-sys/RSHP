@extends('layouts.lte.main')

@section('title', 'Lengkapi Data Perawat')

@section('content')
<section class="py-5" style="background-color:#fffff;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4">
    <h3 class="mb-3">Form Kelengkapan Data Perawat</h3>

    <form action="{{ route('admin.perawat.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>User Perawat</label>
            <select name="iduser" class="form-control" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $u)
                <option value="{{ $u->iduser }}">{{ $u->nama }} - {{ $u->email }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Pendidikan</label>
            <input type="text" name="pendidikan" class="form-control" required>
        </div>

        <div class="text-end">
            <a href="{{ route('admin.perawat.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
            <button type="submit" class="btn btn-primary">💾 Simpan</button>
    </form>
</div>
@endsection
