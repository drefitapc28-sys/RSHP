<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class RasHewanController extends Controller
{
    public function index()
    {
        $data = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select(
                'ras_hewan.idras_hewan',
                'ras_hewan.nama_ras',
                'jenis_hewan.nama_jenis_hewan'
            )
            ->get();

        return view('Admin.Ras-hewan.index', compact('data'));
    }

    public function create()
    {
        $jenisHewan = DB::table('jenis_hewan')->get();
        return view('Admin.Ras-hewan.create', compact('jenisHewan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ras' => 'required|max:100',
            'idjenis_hewan' => 'required|integer',
        ]);

        DB::table('ras_hewan')->insert([
            'nama_ras' => $request->nama_ras,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $rasHewan = DB::table('ras_hewan')->where('idras_hewan', $id)->first();
        $jenisHewan = DB::table('jenis_hewan')->get();
        return view('Admin.Ras-hewan.edit', compact('rasHewan', 'jenisHewan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ras' => 'required|max:100',
            'idjenis_hewan' => 'required|integer',
        ]);

        DB::table('ras_hewan')->where('idras_hewan', $id)->update([
            'nama_ras' => $request->nama_ras,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('ras_hewan')->where('idras_hewan', $id)->delete();
        return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan berhasil dihapus!');
    }
}
