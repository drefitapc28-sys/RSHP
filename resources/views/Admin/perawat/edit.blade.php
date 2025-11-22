@extends('layouts.lte.main')

@section('title','Edit Data Perawat')

@section('content')
<section class="py-5">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4">
        <h3 class="mb-4">Edit Data Perawat</h3>

        <form action="{{ route('admin.perawat.update', $perawat->id_perawat) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama User</label>
                <input type="text" class="form-control" value="{{ $perawat->nama }}" disabled>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $perawat->alamat }}">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $perawat->no_hp }}">
            </div>

            <div class="mb-3">
                <label>Pendidikan</label>
                <input type="text" name="pendidikan" class="form-control" value="{{ $perawat->pendidikan }}">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option value="L" {{ $perawat->jenis_kelamin=='L'?'selected':'' }}>Laki-laki</option>
                    <option value="P" {{ $perawat->jenis_kelamin=='P'?'selected':'' }}>Perempuan</option>
                </select>
            </div>

            <button class="btn btn-primary">Simpan Perubahan</button>

        </form>

    </div>
</div>
@endsection
