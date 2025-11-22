<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardDokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userName = $user->nama; // ambil nama dari tabel user

        $jumlahRekamMedis = DB::table('rekam_medis')->count();
        $jumlahPemilik = DB::table('pemilik')->count();
        $jumlahPet = DB::table('pet')->count();

        return view('dokter.Dokter_Dashboard', compact(
            'userName',
            'jumlahRekamMedis',
            'jumlahPemilik',
            'jumlahPet'
        ));
    }

    public function profil()
    {
        $iduser = Auth::user()->iduser;

        // join user + dokter
        $dokter = \DB::table('dokter')
            ->join('user', 'user.iduser', '=', 'dokter.iduser')
            ->where('dokter.iduser', $iduser)
            ->select(
                'dokter.*',
                'user.nama',
                'user.email'
            )
            ->first();

        return view('dokter.profil', compact('dokter'));
    }

}

