@extends('layouts.lte.main')

@section('title', 'Data Hewan Peliharaan | RSHP Unair')

@section('content')
<div class="app-content">
    <div class="container-fluid">

        {{-- Breadcrumb --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Hewan Peliharaan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Hewan Peliharaan</li>
                </ol>
            </div>
        </div>

        {{-- Card Table --}}
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Hewan Peliharaan</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.pet.create') }}" 
                               class="btn btn-primary btn-sm">
                                + Tambah Hewan
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50px">No</th>
                                    <th>Nama Hewan</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Warna/Tanda</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pemilik</th>
                                    <th>Ras</th>
                                    <th style="width: 150px">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pets as $index => $pet)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pet->nama }}</td>
                                    <td>{{ $pet->tanggal_lahir ? \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d/m/Y') : '-' }}</td>
                                    <td>{{ $pet->warna_tanda ?? '-' }}</td>
                                    <td>
                                        @if ($pet->jenis_kelamin == 'L')
                                            Jantan ♂
                                        @elseif ($pet->jenis_kelamin == 'P')
                                            Betina ♀
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $pet->nama_pemilik ?? '-' }}</td>
                                    <td>{{ $pet->nama_ras ?? '-' }}</td>

                                    <td>
                                        <a href="{{ route('admin.pet.edit', $pet->idpet) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.pet.delete', $pet->idpet) }}"
                                              method="POST"
                                              style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection