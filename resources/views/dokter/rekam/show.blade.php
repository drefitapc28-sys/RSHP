@extends('layout.dashboard')

@section('title','Detail Rekam Medis')

@section('content')
<div class="container">
    <h2 class="text-center mb-3">Detail Rekam Medis</h2>

    <p><b>ID:</b> {{ $rekam->idrekam_medis }}</p>
    <p><b>Tanggal:</b> {{ $rekam->created_at }}</p>
    <p><b>Hewan:</b> {{ $rekam->nama_pet }}</p>
    <p><b>Pemilik:</b> {{ $rekam->nama_pemilik }}</p>
    <p><b>Anamnesa:</b> {{ $rekam->anamnesa }}</p>
    <p><b>Temuan Klinis:</b> {{ $rekam->temuan_klinis }}</p>
    <p><b>Diagnosa:</b> {{ $rekam->diagnosa }}</p>

    <hr>

    <h4>Tindakan / Terapi</h4>
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Deskripsi</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail as $d)
            <tr>
                <td>{{ $d->kode }}</td>
                <td>{{ $d->deskripsi_tindakan_terapi }}</td>
                <td>{{ $d->detail }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('dokter.rekam.addTerapi', $rekam->idrekam_medis) }}" method="post" class="mt-3">
        @csrf
        <label>Kode Tindakan:</label>
        <select name="idkode_tindakan_terapi" class="form-control mb-2" required>
            <option value="">-- Pilih Kode --</option>
            @foreach($kode as $k)
            <option value="{{ $k->idkode_tindakan_terapi }}">{{ $k->kode }} - {{ $k->deskripsi_tindakan_terapi }}</option>
            @endforeach
        </select>

        <label>Detail:</label>
        <textarea name="detail" class="form-control mb-2"></textarea>

        <button class="btn btn-success">Tambah Terapi</button>
    </form>

</div>
@endsection
