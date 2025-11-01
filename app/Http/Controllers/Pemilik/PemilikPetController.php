<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemilikPetController extends Controller
{
    public function index()
    {
        $idPemilik = DB::table('pemilik')
                        ->where('iduser', auth()->user()->iduser)
                        ->value('idpemilik');

        $pets = DB::table('pet')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select(
                'pet.*',
                'ras_hewan.nama_ras',
                'jenis_hewan.nama_jenis_hewan as jenis'
            )
            ->where('pet.idpemilik', $idPemilik)
            ->get();

        return view('pemilik.pet.index', compact('pets'));
    }

}
