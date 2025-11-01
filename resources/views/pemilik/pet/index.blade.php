@extends('layout.dashboard')

@section('title', 'Daftar Pet Saya')

@section('content')

<style>
.container-box {
    max-width: 900px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
h2 { text-align: center; margin-bottom: 20px; }
table {
    width: 100%; border-collapse: collapse; margin-top: 15px;
}
table, th, td { border: 1px solid #ccc; }
th, td { padding: 10px; text-align: center; }
th { background: #ff83b7; color: #fff; }
tr:nth-child(even) { background: #f9f9f9; }
</style>

<div class="container-box">
    <h2>🐾 Daftar Pet Anda</h2>

    @if(count($pets) > 0)
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Warna / Tanda</th>
                <th>Jenis Kelamin</th>
                <th>Jenis Hewan</th>
                <th>Ras</th>
            </tr>

            @foreach ($pets as $p)
            <tr>
                <td>{{ $p->idpet }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->tanggal_lahir }}</td>
                <td>{{ $p->warna_tanda }}</td>
                <td>{{ $p->jenis_kelamin == 'J' ? 'Jantan' : 'Betina' }}</td>
                <td>{{ $p->jenis }}</td>
                <td>{{ $p->nama_ras }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p style="text-align:center;">Belum ada pet terdaftar.</p>
    @endif
</div>

@endsection
