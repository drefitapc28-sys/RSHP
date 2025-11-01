<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemilikRekamMedisController extends Controller
{
    public function index()
    {
        $iduser = auth()->user()->iduser;

        // ambil id pemilik
        $idpemilik = DB::table('pemilik')
            ->where('iduser', $iduser)
            ->value('idpemilik');

        $rekam = DB::table('rekam_medis')
            ->join('temu_dokter', 'rekam_medis.idreservasi_dokter', '=', 'temu_dokter.idreservasi_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('role_user', 'temu_dokter.idrole_user', '=', 'role_user.idrole_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('pet.idpemilik', $idpemilik)
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_pet',
                'user.nama as nama_dokter'
            )
            ->orderBy('rekam_medis.idrekam_medis', 'DESC')
            ->get();

        return view('pemilik.rekam.index', compact('rekam'));
    }

    public function show($id)
    {
        $iduser = auth()->user()->iduser;

        $idpemilik = DB::table('pemilik')
            ->where('iduser', $iduser)
            ->value('idpemilik');

        $rekam = DB::table('rekam_medis')
            ->join('temu_dokter', 'rekam_medis.idreservasi_dokter', '=', 'temu_dokter.idreservasi_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('role_user', 'temu_dokter.idrole_user', '=', 'role_user.idrole_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser') // dokter asli dari reservasi
            ->where('rekam_medis.idrekam_medis', $id)
            ->where('pet.idpemilik', $idpemilik)
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_pet',
                'user.nama as dokter' // dokter asli
            )
            ->first();


        if (!$rekam) abort(404);

        $details = DB::table('detail_rekam_medis')
            ->join(
                'kode_tindakan_terapi',
                'detail_rekam_medis.idkode_tindakan_terapi',
                '=',
                'kode_tindakan_terapi.idkode_tindakan_terapi'
            )
            ->where('detail_rekam_medis.idrekam_medis', $id)
            ->select(
                'kode_tindakan_terapi.kode',
                'kode_tindakan_terapi.deskripsi_tindakan_terapi',
                'detail_rekam_medis.detail'
            )
            ->get();

        return view('pemilik.rekam.show', compact('rekam', 'details'));
    }


}
