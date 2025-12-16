<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PerawatPemilikController extends Controller
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
            ->orderBy('pemilik.idpemilik', 'ASC')
            ->get();

        return view('perawat.pemilik.index', compact('data'));
    }

}
