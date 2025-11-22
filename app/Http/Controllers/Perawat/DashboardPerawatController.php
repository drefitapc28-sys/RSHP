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

    public function profil()
    {
        $iduser = Auth::id(); // ambil id user yang login

        $perawat = \DB::table('perawat')
            ->join('user', 'user.iduser', '=', 'perawat.iduser')
            ->where('perawat.iduser', $iduser)
            ->select(
                'perawat.*',
                'user.nama',
                'user.email'
            )
            ->first();

        return view('perawat.profil', compact('perawat'));
    }


}
