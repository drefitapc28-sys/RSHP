<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PemilikReservasiController extends Controller
{
    public function index()
    {
        $iduser = auth()->user()->iduser;

        $idpemilik = DB::table('pemilik')
            ->where('iduser', $iduser)
            ->value('idpemilik');

        $reservasi = DB::table('temu_dokter')
            ->join('pet', 'pet.idpet', '=', 'temu_dokter.idpet')
            ->join('role_user', 'role_user.idrole_user', '=', 'temu_dokter.idrole_user')
            ->join('user', 'user.iduser', '=', 'role_user.iduser')
            ->where('pet.idpemilik', $idpemilik)
            ->select(
                'temu_dokter.no_urut',
                'pet.nama as nama_pet',
                'user.nama as nama_dokter',
                'temu_dokter.waktu_daftar',
                'temu_dokter.status'
            )
            ->orderBy('temu_dokter.no_urut')
            ->get();

        return view('pemilik.reservasi.index', compact('reservasi'));
    }
}
