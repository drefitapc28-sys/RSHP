@extends('layouts.lte.main')

@section('title','Edit Data Dokter')

@section('content')
<section class="py-5">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4">
        <h3 class="mb-4">Edit Data Dokter</h3>

        <form action="{{ route('admin.dokter.update', $dokter->id_dokter) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Dokter</label>
                <input type="text" value="{{ $dokter->nama }}" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $dokter->alamat }}">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $dokter->no_hp }}">
            </div>

            <div class="mb-3">
                <label>Bidang Dokter</label>
                <input type="text" name="bidang_dokter" class="form-control" value="{{ $dokter->bidang_dokter }}">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option value="L" {{ $dokter->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $dokter->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
  </div>
</section>
@endsection
