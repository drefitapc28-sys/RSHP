<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{

    public function index()
    {
        $dokter = DB::table('dokter')
            ->join('user', 'user.iduser', '=', 'dokter.iduser')
            ->select('dokter.*', 'user.nama', 'user.email')
            ->get();

        return view('admin.dokter.index', compact('dokter'));
    }

    public function form()
    {
        // Ambil user dengan role dokter, tetapi exclude yang sudah punya data di tabel dokter
        $users = DB::table('user')
            ->join('role_user','user.iduser','=','role_user.iduser')
            ->where('role_user.idrole', 2) // role 2 = dokter
            ->whereNotIn('user.iduser', function ($query) {
                $query->select('iduser')->from('dokter');
            })
            ->select('user.*')
            ->get();

        return view('admin.dokter.form', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'bidang_dokter' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        // cek apakah user ini sudah punya data dokter
        $existing = DB::table('dokter')
            ->where('iduser', $request->iduser)
            ->first();

        if ($existing) {
            // UPDATE jika data sudah ada
            DB::table('dokter')
                ->where('iduser', $request->iduser)
                ->update([
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'bidang_dokter' => $request->bidang_dokter,
                    'jenis_kelamin' => $request->jenis_kelamin,
                ]);

            return redirect()->route('admin.dokter.form')
                ->with('success', 'Data dokter berhasil diperbarui');
        }

        // INSERT jika belum ada
        DB::table('dokter')->insert([
            'iduser' => $request->iduser,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'bidang_dokter' => $request->bidang_dokter,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('admin.dokter.form')
            ->with('success','Data dokter berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dokter = DB::table('dokter')
            ->join('user', 'user.iduser', '=', 'dokter.iduser')
            ->where('dokter.id_dokter', $id)
            ->select('dokter.*', 'user.nama', 'user.email')
            ->first();

        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required',
            'no_hp' => 'required',
            'bidang_dokter' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        DB::table('dokter')->where('id_dokter', $id)->update([
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'bidang_dokter' => $request->bidang_dokter,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil diperbarui');
    }

    public function delete($id)
    {
        DB::table('dokter')->where('id_dokter', $id)->delete();

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil dihapus');
    }


}
