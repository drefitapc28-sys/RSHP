<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DokterRekamMedisController extends Controller
{
    public function index()
    {
        $rekam = DB::table('rekam_medis')
            ->join('temu_dokter', 'rekam_medis.idreservasi_dokter', '=', 'temu_dokter.idreservasi_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('rekam_medis.*', 'pet.nama as nama_pet', 'user.nama as nama_pemilik')
            ->orderBy('idrekam_medis', 'desc')
            ->get();

        return view('dokter.rekam.index', compact('rekam'));
    }

    public function show($id)
    {
        $rekam = DB::table('rekam_medis')
            ->join('temu_dokter', 'rekam_medis.idreservasi_dokter', '=', 'temu_dokter.idreservasi_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('rekam_medis.*', 'pet.nama as nama_pet', 'user.nama as nama_pemilik')
            ->where('idrekam_medis', $id)
            ->first();

        $detail = DB::table('detail_rekam_medis')
            ->join('kode_tindakan_terapi', 'detail_rekam_medis.idkode_tindakan_terapi', '=', 'kode_tindakan_terapi.idkode_tindakan_terapi')
            ->where('idrekam_medis', $id)
            ->get();

        $kode = DB::table('kode_tindakan_terapi')->orderBy('kode')->get();

        return view('dokter.rekam.show', compact('rekam', 'detail', 'kode'));
    }

    public function addTerapi($id)
    {
        request()->validate([
            'idkode_tindakan_terapi' => 'required',
            'detail' => 'nullable|string'
        ]);

        DB::table('detail_rekam')->insert([
            'idrekam_medis' => $id,
            'idkode_tindakan_terapi' => request('idkode_tindakan_terapi'),
            'detail' => request('detail'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Tindakan / terapi berhasil ditambahkan!');
    }

    

}
