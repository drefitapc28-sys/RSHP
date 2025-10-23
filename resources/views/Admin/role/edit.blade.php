@extends('layout.main')

@section('title', 'Edit Role | RSHP Unair')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4 border-0 rounded-4">
        <h3 class="text-center mb-3 text-gradient fw-bold">✏️ Edit Role</h3>

        <form action="{{ route('admin.role.update', $role->idrole) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_role" class="form-label fw-semibold">Nama Role</label>
                <input type="text" class="form-control" id="nama_role" name="nama_role"
                       value="{{ $role->nama_role }}" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
                <button type="submit" class="btn btn-primary px-4">💾 Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
