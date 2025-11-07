@extends('layout.dashboard')

@section('title', 'Data Hewan Pasien')

@section('content')
<div class="container mt-4">

    <h3 class="fw-bold text-purple mb-3">🐾 Data Hewan Pasien</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover">
                <thead class="table-purple text-white">
                    <tr>
                        <th>id</th>
                        <th>Nama Pet</th>
                        <th>Jenis</th>
                        <th>Ras</th>
                        <th>Jenis Kelamin</th>
                        <th>Pemilik</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pets as $p)
                        <tr>
                        <td>{{ $p->idpet }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->nama_jenis_hewan }}</td>
                        <td>{{ $p->nama_ras }}</td>
                        <td>{{ $p->jenis_kelamin }}</td>
                        <td>{{ $p->nama_pemilik }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Belum ada data hewan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <a href="{{ route('perawat.dashboard') }}" class="btn btn-secondary mt-2">
                ⬅ Kembali
            </a>

        </div>
    </div>
</div>
@endsection
