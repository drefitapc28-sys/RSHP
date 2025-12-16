@extends('layouts.lte.main')

@section('title', 'Edit Pet')

@section('content')
<div class="container mt-4" style="max-width:600px;">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4 class="mb-0">✏️ Edit Pet</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('resepsionis.pet.update', $pet->idpet) }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Pet</label>
                    <input type="text" name="nama" class="form-control"
                           value="{{ $pet->nama }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control"
                           value="{{ $pet->tanggal_lahir }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Warna / Tanda</label>
                    <input type="text" name="warna_tanda" class="form-control"
                           value="{{ $pet->warna_tanda }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="J" {{ $pet->jenis_kelamin == 'J' ? 'selected' : '' }}>Jantan</option>
                        <option value="B" {{ $pet->jenis_kelamin == 'B' ? 'selected' : '' }}>Betina</option>
                    </select>
                </div>

                <div class="text-end">
                    <a href="{{ route('resepsionis.pet.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
                    <button class="btn btn-warning">💾 Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
