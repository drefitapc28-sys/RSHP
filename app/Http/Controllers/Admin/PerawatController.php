<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerawatController extends Controller
{
    public function index()
    {
        $perawat = DB::table('perawat')
            ->join('user', 'user.iduser', '=', 'perawat.iduser')
            ->select('perawat.*', 'user.nama', 'user.email')
            ->get();

        return view('admin.perawat.index', compact('perawat'));
    }

    public function form()
    {
        // Ambil user dengan role perawat, tapi exclude yang sudah punya data perawat
        $users = DB::table('user')
            ->join('role_user','user.iduser','=','role_user.iduser')
            ->where('role_user.idrole', 3) // role 3 = perawat
            ->whereNotIn('user.iduser', function ($query) {
                $query->select('iduser')->from('perawat');
            })
            ->select('user.*')
            ->get();

        return view('admin.perawat.form', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan' => 'required',
        ]);

        // cek apakah user ini sudah punya data perawat
        $existing = DB::table('perawat')
            ->where('iduser', $request->iduser)
            ->first();

        if ($existing) {

            // UPDATE jika sudah ada
            DB::table('perawat')
                ->where('iduser', $request->iduser)
                ->update([
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'pendidikan' => $request->pendidikan,
                ]);

            return redirect()->route('admin.perawat.form')
                ->with('success', 'Data perawat berhasil diperbarui');
        }

        // INSERT jika belum ada
        DB::table('perawat')->insert([
            'iduser' => $request->iduser,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
        ]);

        return redirect()->route('admin.perawat.form')
            ->with('success', 'Data perawat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $perawat = DB::table('perawat')
            ->join('user', 'user.iduser', '=', 'perawat.iduser')
            ->where('perawat.id_perawat', $id)
            ->select('perawat.*', 'user.nama', 'user.email')
            ->first();

        return view('admin.perawat.edit', compact('perawat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan' => 'required',
        ]);

        DB::table('perawat')->where('id_perawat', $id)->update([
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
        ]);

        return redirect()->route('admin.perawat.index')->with('success', 'Data perawat berhasil diperbarui');
    }

    public function delete($id)
    {
        DB::table('perawat')->where('id_perawat', $id)->delete();

        return redirect()->route('admin.perawat.index')->with('success', 'Data perawat berhasil dihapus');
    }



}
