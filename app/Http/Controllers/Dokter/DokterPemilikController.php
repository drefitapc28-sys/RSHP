<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DokterPemilikController extends Controller
{
    public function index()
    {
        $data = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select(
                'pemilik.idpemilik',
                'pemilik.no_wa',
                'pemilik.alamat',
                'user.nama as nama_pemilik',
                'user.email'
            )
            ->orderBy('pemilik.idpemilik', 'DESC')
            ->get();

        return view('dokter.pemilik.index', compact('data'));
    }

}
