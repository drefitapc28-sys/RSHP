<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JenisHewanController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $data = DB::table('jenis_hewan')->get();
        return view('Admin.Jenis-hewan.index', compact('data'));
    }

    // Form tambah data
    public function create()
    {
        return view('Admin.Jenis-hewan.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|max:50',
        ]);

        DB::table('jenis_hewan')->insert([
            'nama_jenis_hewan' => $request->nama_jenis_hewan,
        ]);

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Jenis hewan berhasil ditambahkan!');
    }

    // Form edit
    public function edit($id)
    {
        $jenisHewan = DB::table('jenis_hewan')->where('idjenis_hewan', $id)->first();
        return view('Admin.Jenis-hewan.edit', compact('jenisHewan'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|max:50',
        ]);

        DB::table('jenis_hewan')->where('idjenis_hewan', $id)->update([
            'nama_jenis_hewan' => $request->nama_jenis_hewan,
        ]);

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Jenis hewan berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        DB::table('jenis_hewan')->where('idjenis_hewan', $id)->delete();
        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Jenis hewan berhasil dihapus!');
    }
}
