<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
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

    public function kontak()
    {
        return view('kontak');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function cekKoneksi()
    {
        try {
            \DB::connection()->getPdo();
            return "Koneksi database berhasil!";
        } catch (\Exception $e) {
            return "Gagal terkoneksi ke database: " . $e->getMessage();
        }
    }
}

