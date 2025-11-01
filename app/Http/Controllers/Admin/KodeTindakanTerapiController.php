<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KodeTindakanTerapiController extends Controller
{
    // =======================
    // 🔹 INDEX
    // =======================
    public function index()
    {
        $data = DB::table('kode_tindakan_terapi')
            ->join('kategori', 'kode_tindakan_terapi.idkategori', '=', 'kategori.idkategori')
            ->join('kategori_klinis', 'kode_tindakan_terapi.idkategori_klinis', '=', 'kategori_klinis.idkategori_klinis')
            ->select(
                'kode_tindakan_terapi.*',
                'kategori.nama_kategori',
                'kategori_klinis.nama_kategori_klinis'
            )
            ->orderBy('idkode_tindakan_terapi', 'ASC')
            ->get();

        return view('Admin.Kode-tindakan-terapi.index', compact('data'));
    }

    // =======================
    // 🔹 CREATE
    // =======================
    public function create()
    {
        $kategori = DB::table('kategori')->get();
        $kategoriKlinis = DB::table('kategori_klinis')->get();

        return view('Admin.Kode-tindakan-terapi.create', compact('kategori', 'kategoriKlinis'));
    }

    // =======================
    // 🔹 STORE
    // =======================
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|max:20|unique:kode_tindakan_terapi,kode',
            'deskripsi_tindakan_terapi' => 'required|max:255',
            'idkategori' => 'required|integer',
            'idkategori_klinis' => 'required|integer',
        ]);

        DB::table('kode_tindakan_terapi')->insert([
            'kode' => $request->kode,
            'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()->route('admin.kode-tindakan-terapi.index')
            ->with('success', 'Kode tindakan berhasil ditambahkan!');
    }

    // =======================
    // 🔹 EDIT
    // =======================
    public function edit($id)
    {
        $data = DB::table('kode_tindakan_terapi')->where('idkode_tindakan_terapi', $id)->first();
        $kategori = DB::table('kategori')->get();
        $kategoriKlinis = DB::table('kategori_klinis')->get();

        if (!$data) {
            return redirect()->route('admin.kode-tindakan-terapi.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('Admin.Kode-tindakan-terapi.edit', compact('data', 'kategori', 'kategoriKlinis'));
    }

    // =======================
    // 🔹 UPDATE
    // =======================
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|max:20',
            'deskripsi_tindakan_terapi' => 'required|max:255',
            'idkategori' => 'required|integer',
            'idkategori_klinis' => 'required|integer',
        ]);

        DB::table('kode_tindakan_terapi')->where('idkode_tindakan_terapi', $id)->update([
            'kode' => $request->kode,
            'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()->route('admin.kode-tindakan-terapi.index')
            ->with('success', 'Kode tindakan berhasil diperbarui!');
    }

    // =======================
    // 🔹 DESTROY
    // =======================
    public function destroy($id)
    {
        DB::table('kode_tindakan_terapi')->where('idkode_tindakan_terapi', $id)->delete();

        return redirect()->route('admin.kode-tindakan-terapi.index')
            ->with('success', 'Kode tindakan berhasil dihapus!');
    }
}
