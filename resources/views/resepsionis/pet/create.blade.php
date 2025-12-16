@extends('layouts.lte.main')

@section('title', 'Tambah Pet')

@section('content')
<div class="container mt-4" style="max-width:600px;">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">🐾 Registrasi Pet</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('resepsionis.pet.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Pet</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Warna / Tanda</label>
                    <input type="text" name="warna_tanda" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="J">Jantan</option>
                        <option value="B">Betina</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pemilik</label>
                    <select name="idpemilik" class="form-control" required>
                        <option value="">-- Pilih Pemilik --</option>
                        @foreach($pemilik as $p)
                            <option value="{{ $p->idpemilik }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ras Hewan</label>
                    <select name="idras_hewan" class="form-control" required>
                        <option value="">-- Pilih Ras --</option>
                        @foreach($ras as $r)
                            <option value="{{ $r->idras_hewan }}">{{ $r->nama_ras }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-end">
                    <a href="{{ route('resepsionis.pet.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
                    <button class="btn btn-success">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
