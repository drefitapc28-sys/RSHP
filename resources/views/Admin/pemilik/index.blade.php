@extends('layout.Dashboard')

@section('title', 'Data Pemilik Hewan | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container-fluid">
    <h2 class="text-center mb-3 fw-bold" style="color:#2563eb;">👩‍⚕️ Data Pemilik Hewan</h2>
    <p class="text-center text-muted">
      Berikut adalah daftar <strong>pemilik hewan</strong> yang terdaftar di RSHP Universitas Airlangga.
    </p>

    {{-- Tombol Tambah --}}
    <div class="d-flex justify-content-end mb-3">
      <a href="{{ route('admin.pemilik.create') }}" class="btn btn-success px-4">
        + Tambah Pemilik
      </a>
    </div>

    {{-- Tabel Data Pemilik --}}
    <div class="table-responsive">
      <table class="table table-hover table-bordered align-middle text-center shadow-sm rshp-table w-100">
        <thead style="background-color: #fde68a; border: 2px solid #e0b100;">
          <tr>
            <th style="width:6%;">No</th>
            <th>Nama Pemilik</th>
            <th>No. WhatsApp</th>
            <th>Alamat</th>
            <th>Email</th>
            <th style="width:15%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($data as $index => $row)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $row->user_nama }}</td>
            <td>{{ $row->no_wa }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->user_email }}</td>
            <td>
              <div class="btn-group" role="group">
                {{-- Tombol Edit --}}
                <a href="{{ route('admin.pemilik.edit', $row->idpemilik) }}" 
                   class="btn btn-sm btn-primary">✏️ Edit</a>

                {{-- Tombol Hapus --}}
                <form action="{{ route('admin.pemilik.delete', $row->idpemilik) }}" method="POST" 
                      class="d-inline" 
                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">🗑️ Hapus</button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-muted fst-italic">Tidak ada data ditemukan.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- CSS Konsisten --}}
<style>
  .rshp-table {
      width: 100%;
      border: 2px solid #c9a400;
      border-collapse: collapse !important;
      background-color: #fffef5;
  }

  .rshp-table th, .rshp-table td {
      border: 1.5px solid #d4b400 !important;
      padding: 10px;
      vertical-align: middle;
  }

  .rshp-table tr:hover {
      background-color: #fff8dc;
      transition: 0.2s;
  }

  .btn-group .btn {
      margin: 0 2px;
  }
</style>
@endsection
