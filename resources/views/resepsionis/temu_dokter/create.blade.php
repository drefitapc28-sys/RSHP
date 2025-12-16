@extends('layouts.lte.main')

@section('title', 'Tambah Temu Dokter')

@section('content')

<div class="card m-3">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">➕ Tambah Temu Dokter</h3>
    </div>

    <div class="card-body">

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('resepsionis.temu-dokter.store') }}">
            @csrf

            {{-- Pet --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Pilih Pet</label>
                <select name="idpet" class="form-control" required>
                    <option value="">-- Pilih Pet --</option>
                    @foreach ($pets as $p)
                        <option value="{{ $p->idpet }}">
                            {{ $p->nama_pet }} (Pemilik: {{ $p->nama_pemilik }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Dokter --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Pilih Dokter</label>
                <select name="idrole_user" class="form-control" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($dokters as $d)
                        <option value="{{ $d->idrole_user }}">
                            {{ $d->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('resepsionis.temu-dokter.index') }}"
                   class="btn btn-secondary me-2">Kembali</a>

                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
