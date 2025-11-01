<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $data = DB::table('kategori_klinis')->get();
        return view('Admin.Kategori-klinis.index', compact('data'));
    }
    public function create()
    {
        return view('Admin.Kategori-klinis.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|max:100',
        ]);

        DB::table('kategori_klinis')->insert([
            'nama_kategori_klinis' => $request->nama_kategori_klinis,
        ]);

        return redirect()->route('admin.kategori-klinis.index')->with('success', 'Kategori klinis berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $kategoriKlinis = DB::table('kategori_klinis')->where('idkategori_klinis', $id)->first();
        return view('Admin.Kategori-klinis.edit', compact('kategoriKlinis'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|max:100',
        ]);
        DB::table('kategori_klinis')->where('idkategori_klinis', $id)->update([
            'nama_kategori_klinis' => $request->nama_kategori_klinis,
        ]);
        return redirect()->route('admin.kategori-klinis.index')->with('success', 'Kategori klinis berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('kategori_klinis')->where('idkategori_klinis', $id)->delete();
        return redirect()->route('admin.kategori-klinis.index')->with('success', 'Kategori klinis berhasil dihapus!');
    }
}
