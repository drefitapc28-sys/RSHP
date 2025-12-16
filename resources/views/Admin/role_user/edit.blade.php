@extends('layouts.lte.main')

@section('title', 'Edit Status Role')

@section('content')
<section class="py-5" style="background-color:#ffffff;">
    <div class="container" style="max-width:700px;">
        <div class="card shadow p-4 rounded-4 border-0">

            <h3 class="fw-bold text-center mb-4 text-primary">
                Edit Status Role 👤
            </h3>

            <form action="{{ route('admin.role_user.update', $roleUser->idrole_user) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama User --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama User</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $roleUser->nama_user }}"
                           readonly>
                </div>

                {{-- Role --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Role</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $roleUser->nama_role }}"
                           readonly>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Status Role
                    </label>
                    <select name="status"
                            class="form-select @error('status') is-invalid @enderror"
                            required>
                        <option value="1" {{ old('status', $roleUser->status) == 1 ? 'selected' : '' }}>
                            Aktif
                        </option>
                        <option value="0" {{ old('status', $roleUser->status) == 0 ? 'selected' : '' }}>
                            Nonaktif
                        </option>
                    </select>

                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
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
                        💾 Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
</section>
@endsection
