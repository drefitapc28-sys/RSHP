<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{

    public function index()
    {
        $rekam = DB::table('rekam_medis')
            ->join('temu_dokter', 'rekam_medis.idreservasi_dokter', '=', 'temu_dokter.idreservasi_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->join('role_user', 'rekam_medis.dokter_pemeriksa', '=', 'role_user.idrole_user')
            ->join('user as dokter_user', 'role_user.iduser', '=', 'dokter_user.iduser')
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_pet',
                'user.nama as nama_pemilik',
                'dokter_user.nama as nama_dokter'
            )
            ->orderByDesc('rekam_medis.idrekam_medis')
            ->get();

        return view('perawat.rekam_medis.index', compact('rekam'));

}
    public function create()
    {
        $reservasi = DB::table('temu_dokter')
        ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
        ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
        ->join('user', 'pemilik.iduser', '=', 'user.iduser')
        ->join('role_user', 'temu_dokter.idrole_user', '=', 'role_user.idrole_user')
        ->join('user as dokter', 'role_user.iduser', '=', 'dokter.iduser')
        ->whereNotNull('temu_dokter.idpet')   // sementara
        ->select(
            'temu_dokter.idreservasi_dokter',
            'temu_dokter.no_urut',
            'pet.nama as nama_pet',
            'dokter.nama as nama_dokter'
        )
        ->get();

        return view('perawat.rekam_medis.create', compact('reservasi'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'idreservasi_dokter' => 'required',
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
            'diagnosa' => 'required',
        ]);

        DB::table('rekam_medis')->insert([
            'idreservasi_dokter' => $request->idreservasi_dokter,
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
            'diagnosa' => $request->diagnosa,
            'dokter_pemeriksa' => Auth::user()->iduser,
            'created_at' => now()
        ]);

        return redirect()->route('perawat.rekam-medis.index')->with('success', 'Rekam Medis berhasil ditambah!');
    }


    public function show($id)
    {
        $rekam = DB::table('rekam_medis')
            ->join('temu_dokter', 'rekam_medis.idreservasi_dokter', '=', 'temu_dokter.idreservasi_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->join('role_user as dokter_role', 'rekam_medis.dokter_pemeriksa', '=', 'dokter_role.idrole_user')
            ->join('user as dokter_user', 'dokter_role.iduser', '=', 'dokter_user.iduser')
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_pet',
                'user.nama as nama_pemilik',
                'dokter_user.nama as nama_dokter'
            )
            ->where('rekam_medis.idrekam_medis', $id)
            ->first();

        $detail = DB::table('detail_rekam_medis')
            ->join('kode_tindakan_terapi', 'detail_rekam_medis.idkode_tindakan_terapi', '=', 'kode_tindakan_terapi.idkode_tindakan_terapi')
            ->select('kode_tindakan_terapi.kode', 'kode_tindakan_terapi.deskripsi_tindakan_terapi', 'detail_rekam_medis.detail')
            ->where('detail_rekam_medis.idrekam_medis', $id)
            ->get();

        if (!$rekam) {
            return redirect()->route('perawat.rekam-medis')->with('error', 'Rekam medis tidak ditemukan');
        }

        return view('perawat.rekam_medis.show', compact('rekam','detail'));
    }


}
    