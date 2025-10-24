<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung semua tabel utama
        $jumlahUser = DB::table('role_user')->count();
        $jumlahRole = DB::table('role')->count();
        $jumlahJenis = DB::table('jenis_hewan')->count();
        $jumlahRas = DB::table('ras_hewan')->count();
        $jumlahKategori = DB::table('kategori')->count();
        $jumlahKategoriKlinis = DB::table('kategori_klinis')->count();
        $jumlahPemilik = DB::table('pemilik')->count();
        $jumlahPet = DB::table('pet')->count();
        $jumlahKodeTindakan = DB::table('kode_tindakan_terapi')->count();

        // Kirim data ke view
        return view('Admin.dashboard', compact(
            'jumlahUser',
            'jumlahRole',
            'jumlahJenis',
            'jumlahRas',
            'jumlahKategori',
            'jumlahKategoriKlinis',
            'jumlahPemilik',
            'jumlahPet',
            'jumlahKodeTindakan'
        ));
    }
}
