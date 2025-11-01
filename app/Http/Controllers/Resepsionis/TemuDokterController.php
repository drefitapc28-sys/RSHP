<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\User;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\DB;

class TemuDokterController extends Controller
{
    public function index()
    {
        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser') // tambahkan join user
            ->select(
                'pet.idpet',
                'pet.nama as nama_pet',
                'user.nama as nama_pemilik' // ambil nama dari user
            )
            ->get();

        $dokters = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('role_user.idrole', 2)
            ->where('role_user.status', 1)
            ->select('role_user.idrole_user', 'user.nama')
            ->get();

        return view('resepsionis.temu_dokter', compact('pets','dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idpet' => 'required',
            'idrole_user' => 'required'
        ]);

        $no_urut = TemuDokter::whereDate('waktu_daftar', now()->toDateString())->count() + 1;

        TemuDokter::create([
            'idpet' => $request->idpet,
            'idrole_user' => $request->idrole_user,
            'waktu_daftar' => now(),
            'no_urut' => $no_urut,
            'status' => 'A'
        ]);

        return back()->with('success', "Pendaftaran berhasil. Nomor Antrian: $no_urut");
    }
}
