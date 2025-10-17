<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteContoller extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function struktur()
    {
        return view('struktur');
    }

    public function layanan()
    {
        return view('layanan');
    }

    public function visi()
    {
        return view('visi');
    }

    public function login()
    {
        return view('auth.login');
    }
}
