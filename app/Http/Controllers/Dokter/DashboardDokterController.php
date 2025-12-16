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
        $jumlahtemu = DB::table('temu_dokter')
            ->where('idrole_user', function ($query) use ($user) {
                $query->select('role_user.idrole_user')
                      ->from('role_user')
                      ->where('role_user.iduser', $user->iduser)
                      ->where('role_user.idrole', function ($subquery) {
                          $subquery->select('role.idrole')
                                   ->from('role')
                                   ->where('role.nama_role', 'Dokter');
                      });
            })
            ->count();

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

