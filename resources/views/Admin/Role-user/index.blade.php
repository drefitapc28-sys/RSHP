@extends('layout.Dashboard')

@section('title', 'Relasi Role User | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container-fluid">
    <h2 class="text-center mb-3 fw-bold" style="color:#2563eb;">🧩 Relasi Role User</h2>
    <p class="text-center text-muted">
      Menampilkan hubungan antara <strong>pengguna</strong> dan <strong>perannya</strong> dalam sistem RSHP Universitas Airlangga.
    </p>

    {{-- Tombol Tambah --}}
    <div class="d-flex justify-content-end mb-3">
      <a href="{{ route('admin.role-user.create') }}" class="btn btn-success px-4">
        + Tambah Relasi
      </a>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    {{-- Tabel Data --}}
    <div class="table-responsive">
      <table class="table table-hover table-bordered align-middle text-center shadow-sm rshp-table w-100">
        <thead style="background-color: #fde68a; border: 2px solid #e0b100;">
          <tr>
            <th style="width:6%;">No</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th style="width:15%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($data as $index => $row)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $row->user_nama }}</td>
            <td>{{ $row->user_email }}</td>
            <td>{{ $row->nama_role }}</td>
            <td>
              @if ($row->status == 1)
                <span class="badge bg-success">Aktif</span>
              @else
                <span class="badge bg-secondary">Nonaktif</span>
              @endif
            </td>
            <td>
              <div class="btn-group" role="group">
                {{-- Tombol Edit --}}
                <a href="{{ route('admin.role-user.edit', $row->idrole_user) }}" 
                   class="btn btn-sm btn-primary">✏️ Edit</a>

                {{-- Tombol Hapus --}}
                <form action="{{ route('admin.role-user.delete', $row->idrole_user) }}" method="POST" 
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
            <td colspan="6" class="text-muted fst-italic">Belum ada relasi role-user.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- CSS agar konsisten dengan halaman RSHP lain --}}
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
