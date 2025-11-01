@extends('layout.dashboard')

@section('title', 'Detail Rekam Medis')

@section('content')
<div class="container">

    <h3 class="mb-3 text-center">Detail Rekam Medis</h3>

    <div class="card p-3 mb-4">
        <p><strong>Tanggal:</strong> {{ $rekam->created_at }}</p>
        <p><strong>Dokter:</strong> {{ $rekam->nama_dokter }}</p>
        <p><strong>Hewan:</strong> {{ $rekam->nama_pet }}</p>
        <p><strong>Pemilik:</strong> {{ $rekam->nama_pemilik }}</p>
        <p><strong>Anamnesa:</strong> {{ $rekam->anamnesa }}</p>
        <p><strong>Temuan Klinis:</strong> {{ $rekam->temuan_klinis }}</p>
        <p><strong>Diagnosa:</strong> {{ $rekam->diagnosa }}</p>
    </div>

    <h5>Daftar Tindakan/Terapi</h5>
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Deskripsi</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @forelse($detail as $d)
                <tr>
                    <td>{{ $d->kode }}</td>
                    <td>{{ $d->deskripsi_tindakan_terapi }}</td>
                    <td>{{ $d->detail }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Belum ada tindakan</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('perawat.rekam-medis.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
