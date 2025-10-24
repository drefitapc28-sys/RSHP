<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DataMasterController extends Controller
{
    public function index()
    {
        $jumlahUser = DB::table('role_user')->count();
        $jumlahRole = DB::table('role')->count();
        $jumlahJenis = DB::table('jenis_hewan')->count();
        $jumlahRas = DB::table('ras_hewan')->count();
        $jumlahPemilik = DB::table('pemilik')->count();
        $jumlahPet = DB::table('pet')->count();
        $jumlahKategori = DB::table('kategori')->count();
        $jumlahKategoriKlinis = DB::table('kategori_klinis')->count();
        $jumlahKodeTindakan = DB::table('kode_tindakan_terapi')->count();

        return view('Admin.datamaster', compact(
            'jumlahUser', 'jumlahRole', 'jumlahJenis', 'jumlahRas',
            'jumlahPemilik', 'jumlahPet', 'jumlahKategori',
            'jumlahKategoriKlinis', 'jumlahKodeTindakan'
        ));
    }
}
