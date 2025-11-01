<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // ===============================
    // 1️⃣ TAMPILKAN DATA HEWAN
    // ===============================
    public function index()
    {
        $data = DB::table('pet')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select(
                'pet.*',
                'ras_hewan.nama_ras',
                'user.nama as nama_pemilik'
            )
            ->orderBy('pet.idpet', 'asc')
            ->get();

        return view('Admin.Pet.index', compact('data'));
    }

    // ===============================
    // 2️⃣ TAMPILKAN FORM TAMBAH
    // ===============================
    public function create()
    {
        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.idpemilik', 'user.nama')
            ->get();

        $ras = DB::table('ras_hewan')->select('idras_hewan', 'nama_ras')->get();

        return view('Admin.Pet.create', compact('pemilik', 'ras'));
    }

    // ===============================
    // 3️⃣ SIMPAN DATA BARU
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'idpemilik' => 'required|integer',
            'idras_hewan' => 'required|integer',
        ]);

        DB::table('pet')->insert([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda' => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan,
        ]);

        return redirect()->route('admin.pet.index')->with('success', 'Hewan berhasil ditambahkan!');
    }

    // ===============================
    // 4️⃣ TAMPILKAN FORM EDIT
    // ===============================
    public function edit($id)
    {
        $data = DB::table('pet')->where('idpet', $id)->first();

        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.idpemilik', 'user.nama')
            ->get();

        $ras = DB::table('ras_hewan')->select('idras_hewan', 'nama_ras')->get();

        return view('Admin.Pet.edit', compact('data', 'pemilik', 'ras'));
    }

    // ===============================
    // 5️⃣ UPDATE DATA
    // ===============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'idpemilik' => 'required|integer',
            'idras_hewan' => 'required|integer',
        ]);

        DB::table('pet')->where('idpet', $id)->update([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda' => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan,
        ]);

        return redirect()->route('admin.pet.index')->with('success', 'Data hewan berhasil diperbarui!');
    }

    // ===============================
    // 6️⃣ HAPUS DATA
    // ===============================
    public function delete($id)
    {
        DB::table('pet')->where('idpet', $id)->delete();
        return redirect()->route('admin.pet.index')->with('success', 'Data hewan berhasil dihapus!');
    }
}
