@extends('layouts.lte.main')

@section('title', 'Daftar Pet Saya')

@section('content')

<style>
.card {
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin: 20px;
}
.card-header {
    background: #3f51b5;
    color: white;
    padding: 15px 20px;
    border-radius: 8px 8px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.card-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 500;
}
.btn-add {
    background: #5c6bc0;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}
.btn-add:hover {
    background: #7986cb;
}
.card-body {
    padding: 0;
}
table {
    width: 100%;
    border-collapse: collapse;
}
thead {
    background: #f5f5f5;
    border-bottom: 2px solid #e0e0e0;
}
th {
    padding: 12px 15px;
    text-align: left;
    font-weight: 600;
    color: #333;
    font-size: 14px;
}
td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
    font-size: 14px;
    color: #555;
}
tbody tr:hover {
    background: #f9f9f9;
}
.btn-action {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 13px;
    margin-right: 5px;
}
.btn-edit {
    background: #ffc107;
    color: #fff;
}
.btn-edit:hover {
    background: #ffb300;
}
.btn-delete {
    background: #f44336;
    color: #fff;
}
.btn-delete:hover {
    background: #e53935;
}
.text-center {
    text-align: center;
    padding: 30px;
    color: #999;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>🐾 Daftar Pet Anda</h3>
    </div>

    <div class="card-body">
        @if(count($pets) > 0)
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pet</th>
                        <th>Tanggal Lahir</th>
                        <th>Warna / Tanda</th>
                        <th>Jenis Kelamin</th>
                        <th>Jenis Hewan</th>
                        <th>Ras</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->tanggal_lahir }}</td>
                        <td>{{ $p->warna_tanda }}</td>
                        <td>{{ $p->jenis_kelamin == 'J' ? 'Jantan' : 'Betina' }}</td>
                        <td>{{ $p->jenis }}</td>
                        <td>{{ $p->nama_ras }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Belum ada pet terdaftar.</p>
        @endif
    </div>
</div>

@endsection