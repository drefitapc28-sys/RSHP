@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #0b4eb3, #f7d32b);
        font-family: 'Poppins', sans-serif;
    }

    .login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh;
    }

    .login-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 35px 30px;
        width: 390px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        animation: slideDown .5s ease;
    }

    @keyframes slideDown {
        from { transform: translateY(-15px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .login-title {
        text-align: center;
        font-weight: 700;
        font-size: 26px;
        margin-bottom: 5px;
        color: #0b4eb3;
    }

    .sub-title {
        text-align: center;
        font-size: 14px;
        color: #555;
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: 600;
    }

    .btn-login {
        width: 100%;
        background-color: #b0d0ffff;
        border: none;
        font-weight: 600;
    }

    .btn-login:hover {
        background-color: #84ade7ff;
    }

    .forget-link {
        text-decoration: none;
        color: #0b4eb3;
        font-size: 14px;
        display: block;
        text-align: right;
        margin-top: 8px;
    }

    .forget-link:hover {
        text-decoration: underline;
    }

    .remember-box {
        font-size: 14px;
    }
</style>

<div class="login-wrapper">
    <div class="login-card">

        <h2 class="login-title">Login RSHP</h2>
        <p class="sub-title">Rumah Sakit Hewan Pendidikan Universitas Airlangga</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       name="password" required>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Remember --}}
            <div class="mb-2 form-check remember-box">
                <input type="checkbox" class="form-check-input" id="remember" 
                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="form-check-label">Ingat saya</label>
            </div>

            {{-- Login Button --}}
            <button type="submit" class="btn btn-login btn-lg">
                Login
            </button>

            {{-- Forgot Password --}}
            @if (Route::has('password.request'))
                <a class="forget-link" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif

        </form>
    </div>
</div>
@endsection
