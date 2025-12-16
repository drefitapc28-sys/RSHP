@extends('layouts.lte.main')

@section('title', 'Edit User')

@section('content')
<section class="py-5" style="background-color:#ffffff;">
    <div class="container" style="max-width:700px;">
        <div class="card shadow p-4 rounded-4 border-0">

            <h3 class="fw-bold text-center mb-4 text-primary">
                Edit User 👤
            </h3>

            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.user.update', $user->iduser) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama</label>
                    <input type="text"
                           name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $user->nama) }}"
                           required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', $user->email) }}"
                           required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Footer --}}
                <div class="text-end mt-4">
                    <a href="{{ route('admin.user.index') }}"
                       class="btn btn-secondary px-4">
                        ⬅️ Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-primary px-4">
                        💾 Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
</section>
@endsection
