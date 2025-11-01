<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function index()
    {
        $data = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama as user_nama', 'user.email as user_email')
            ->get();

        return view('Admin.pemilik.index', compact('data'));
    }
    public function create()
    {
        $users = DB::table('user')->get();
        return view('Admin.pemilik.create', compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|integer|unique:pemilik,iduser',
            'alamat' => 'required|max:255',
            'no_telepon' => 'required|max:15',
        ]);
        DB::table('pemilik')->insert([
            'iduser' => $request->iduser,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);
        return redirect()->route('admin.pemilik.index')->with('success', 'Pemilik berhasil ditambahkan!');

    }
    public function edit($id)
    {
        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        $users = DB::table('user')->get();
        return view('Admin.pemilik.edit', compact('pemilik', 'users'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'iduser' => 'required|integer|unique:pemilik,iduser,'.$id.',idpemilik',
            'alamat' => 'required|max:255',
            'no_telepon' => 'required|max:15',
        ]);
        DB::table('pemilik')->where('idpemilik', $id)->update([
            'iduser' => $request->iduser,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);
        return redirect()->route('admin.pemilik.index')->with('success', 'Pemilik berhasil diperbarui!');
    }
    public function destroy($id)
    {
        DB::table('pemilik')->where('idpemilik', $id)->delete();
        return redirect()->route('admin.pemilik.index')->with('success', 'Pemilik berhasil dihapus!');
    }   
}
