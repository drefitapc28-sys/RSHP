<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardPemilikController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->iduser;

        // Ambil idpemilik dari tabel pemilik
        $idPemilik = DB::table('pemilik')
            ->where('iduser', $userId)
            ->value('idpemilik');

        // Hitung jumlah hewan milik pemilik
        $jumlahPet = DB::table('pet')
            ->where('idpemilik', $idPemilik)
            ->count();

        // Hitung jumlah reservasi dokter milik pemilik
        $jumlahReservasi = DB::table('temu_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->where('pet.idpemilik', $idPemilik)
            ->count();

        // Hitung jumlah rekam medis milik pemilik
        $jumlahRekam = DB::table('rekam_medis')
            ->join('temu_dokter', 'rekam_medis.idreservasi_dokter', '=', 'temu_dokter.idreservasi_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->where('pet.idpemilik', $idPemilik)
            ->count();

        $userName = auth()->user()->nama;

        return view('pemilik.Pemilik_Dashboard', compact('userName', 'jumlahPet', 'jumlahReservasi', 'jumlahRekam'));
    }

}
