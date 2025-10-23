@extends('layout.main')

@section('title', 'Login | RSHP Unair')

@section('content')
<section id="login" style="max-width: 400px; margin: 40px auto;">
    <h2 style="text-align:center; color:#333;">Login Pengguna</h2>
    <p style="text-align:center; color:#666;">Masuk untuk mengakses sistem Rumah Sakit Hewan Pendidikan Universitas Airlangga</p>

    <form action="{{ url('/login') }}" method="post" style="background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.2);">
        @csrf
        <div style="margin-bottom:15px;">
            <label for="email" style="display:block; font-weight:bold; color:#333;">Email:</label>
            <input type="email" id="email" name="email" required 
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <div style="margin-bottom:15px;">
            <label for="password" style="display:block; font-weight:bold; color:#333;">Password:</label>
            <input type="password" id="password" name="password" required 
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <div style="text-align:center;">
            <button type="submit" 
                    style="background-color:#1979ef; color:#fff; border:none; padding:10px 20px; border-radius:4px; cursor:pointer;">
                Login
            </button>
        </div>
    </form>

</section>
@endsection
