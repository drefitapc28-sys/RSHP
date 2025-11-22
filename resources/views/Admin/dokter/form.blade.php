@extends('layouts.lte.main')

@section('title','Lengkapi Data Dokter')

@section('content')
<section class="py-5" style="background-color:#fffff;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4">
        <h3 class="mb-4">Lengkapi Data Dokter</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.dokter.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Pilih User Dokter</label>
                <select name="iduser" class="form-select" required>
                    <option value="">-- pilih user --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->iduser }}">{{ $user->nama }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control">
            </div>

            <div class="mb-3">
                <label>Bidang Dokter</label>
                <input type="text" name="bidang_dokter" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="text-end">
            <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
            <button type="submit" class="btn btn-primary">💾 Simpan</button>

        </form>

    </div>
</div>
@endsection
