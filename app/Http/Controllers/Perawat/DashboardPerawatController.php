<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardPerawatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $jumlahPemilik      = DB::table('pemilik')->count();
        $jumlahPet          = DB::table('pet')->count();
        $jumlahTemu         = DB::table('temu_dokter')->count();
        $jumlahRekamMedis   = DB::table('rekam_medis')->count();

        return view('perawat.Perawat_Dashboard', [
            'userName'          => $user->nama,
            'jumlahPemilik'     => $jumlahPemilik,
            'jumlahPet'         => $jumlahPet,
            'jumlahTemu'        => $jumlahTemu,
            'jumlahRekamMedis'  => $jumlahRekamMedis, 
        ]);
    }
}
