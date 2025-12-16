@extends('layouts.lte.main')

@section('title', 'Edit Temu Dokter')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Temu Dokter</h3>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-warning">
                <h3 class="card-title">✏️ Form Edit Temu Dokter</h3>
            </div>

            <div class="card-body">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('resepsionis.temu-dokter.update', $temu->idreservasi_dokter) }}">
                    @csrf
                    @method('PUT')

                    {{-- Tanggal Daftar (readonly) --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tanggal Daftar</label>
                        <input type="date"
                               class="form-control"
                               value="{{ $temu->waktu_daftar }}"
                               readonly>
                    </div>

                    {{-- Pet --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pet</label>
                        <select name="idpet" class="form-control" required>
                            @foreach ($pets as $p)
                                <option value="{{ $p->idpet }}"
                                    {{ $temu->idpet == $p->idpet ? 'selected' : '' }}>
                                    {{ $p->nama_pet }} (Pemilik: {{ $p->nama_pemilik }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Dokter --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Dokter</label>
                        <select name="idrole_user" class="form-control" required>
                            @foreach ($dokters as $d)
                                <option value="{{ $d->idrole_user }}"
                                    {{ $temu->idrole_user == $d->idrole_user ? 'selected' : '' }}>
                                    {{ $d->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status Temu</label>
                        <select name="status" class="form-control" required>
                            <option value="A" {{ $temu->status == 'A' ? 'selected' : '' }}>Aktif</option>
                            <option value="S" {{ $temu->status == 'S' ? 'selected' : '' }}>Selesai</option>
                            <option value="B" {{ $temu->status == 'B' ? 'selected' : '' }}>Batal</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('resepsionis.temu-dokter.index') }}"
                           class="btn btn-secondary me-2">
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-warning">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
