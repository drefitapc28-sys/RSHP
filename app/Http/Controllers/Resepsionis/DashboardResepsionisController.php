<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardResepsionisController extends Controller
{
    public function index()
    {
        // Ambil nama user dari session (atau Auth)
        $userName = session('user_name') ?? Auth::user()->nama ?? 'User';

        // Statistik singkat buat dashboard resepsionis
        $jumlahPemilik = DB::table('pemilik')->count();
        $jumlahPet = DB::table('pet')->count();
        $jumlahTemu = DB::table('temu_dokter')->count();

        // Kirim data ke view
        return view('resepsionis.Resepsionis_Dashboard', compact(
            'userName',
            'jumlahPemilik',
            'jumlahPet',
            'jumlahTemu'
        ));
    }
}
