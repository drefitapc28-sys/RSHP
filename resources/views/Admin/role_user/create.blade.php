@extends('layouts.lte.main')

@section('title', 'Tambah Role User')

@section('content')
<section class="py-5" style="background-color:#ffffff;">
    <div class="container" style="max-width:700px;">
        <div class="card shadow p-4 rounded-4 border-0">

            <h3 class="fw-bold text-center mb-4 text-primary">
                Tambah Role User 👤
            </h3>

            {{-- Error Validation --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.role_user.store') }}" method="POST">
                @csrf

                {{-- User --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">User</label>
                    <select name="iduser"
                            class="form-select @error('iduser') is-invalid @enderror"
                            required>
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->iduser }}"
                                {{ old('iduser') == $user->iduser ? 'selected' : '' }}>
                                {{ $user->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('iduser')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Role --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Role</label>
                    <select name="idrole"
                            class="form-select @error('idrole') is-invalid @enderror"
                            required>
                        <option value="">-- Pilih Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->idrole }}"
                                {{ old('idrole') == $role->idrole ? 'selected' : '' }}>
                                {{ $role->nama_role }}
                            </option>
                        @endforeach
                    </select>
                    @error('idrole')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Action --}}
                <div class="text-end mt-4">
                    <a href="{{ route('admin.role_user.index') }}"
                       class="btn btn-secondary px-4">
                        ⬅️ Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-primary px-4">
                        💾 Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</section>
@endsection
