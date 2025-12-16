<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TemuDokterController extends Controller
{
    public function index()
    {
        $temu = DB::table('temu_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user as pemilik_user', 'pemilik.iduser', '=', 'pemilik_user.iduser')
            ->join('role_user', 'temu_dokter.idrole_user', '=', 'role_user.idrole_user')
            ->join('user as dokter_user', 'role_user.iduser', '=', 'dokter_user.iduser')
            ->select(
                'temu_dokter.idreservasi_dokter',
                'temu_dokter.no_urut',
                'temu_dokter.waktu_daftar',
                'temu_dokter.status',
                'pet.nama as nama_pet',
                'pemilik_user.nama as nama_pemilik',
                'dokter_user.nama as nama_dokter'
            )
            ->orderBy('temu_dokter.idreservasi_dokter', 'DESC')
            ->get();

        return view('resepsionis.temu_dokter.index', compact('temu'));
    }

    public function create()
    {
        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pet.idpet', 'pet.nama as nama_pet', 'user.nama as nama_pemilik')
            ->get();

        $dokters = DB::table('role_user')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('role.nama_role', 'Dokter')
            ->where('role_user.status', 1)
            ->select('role_user.idrole_user', 'user.nama')
            ->get();

        return view('resepsionis.temu_dokter.create', compact('pets', 'dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idpet' => 'required',
            'idrole_user' => 'required',
        ]);

        // no urut harian
        $noUrut = DB::table('temu_dokter')
            ->whereDate('waktu_daftar', Carbon::today())
            ->max('no_urut');

        $noUrut = $noUrut ? $noUrut + 1 : 1;

        DB::table('temu_dokter')->insert([
            'no_urut'       => $noUrut,
            'waktu_daftar'  => Carbon::today(),
            'status'        => 'A', // A = Aktif
            'idpet'         => $request->idpet,
            'idrole_user'   => $request->idrole_user,
        ]);

        return redirect()
            ->route('resepsionis.temu-dokter.index')
            ->with('success', 'Temu dokter berhasil ditambahkan');
    }

    public function edit($id)
    {
        $temu = DB::table('temu_dokter')
            ->where('idreservasi_dokter', $id)
            ->first();

        if (!$temu) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pet.idpet', 'pet.nama as nama_pet', 'user.nama as nama_pemilik')
            ->get();

        $dokters = DB::table('role_user')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('role.nama_role', 'Dokter')
            ->where('role_user.status', 1)
            ->select('role_user.idrole_user', 'user.nama')
            ->get();

        return view('resepsionis.temu_dokter.edit', compact('temu', 'pets', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        DB::table('temu_dokter')
            ->where('idreservasi_dokter', $id)
            ->update([
                'idpet' => $request->idpet,
                'idrole_user' => $request->idrole_user,
            ]);

        return redirect()
            ->route('resepsionis.temu-dokter.index')
            ->with('success', 'Temu dokter berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::table('temu_dokter')
            ->where('idreservasi_dokter', $id)
            ->delete();

        return back()->with('success', 'Temu dokter berhasil dihapus');
    }
}
