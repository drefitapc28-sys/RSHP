<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ResepsionisPetController extends Controller
{
    public function index()
    {
        $pets = DB::table('pet')
            ->join('ras_hewan','pet.idras_hewan','=','ras_hewan.idras_hewan')
            ->join('jenis_hewan','ras_hewan.idjenis_hewan','=','jenis_hewan.idjenis_hewan')
            ->join('pemilik','pet.idpemilik','=','pemilik.idpemilik')
            ->join('user','pemilik.iduser','=','user.iduser')
            ->select(
                'pet.idpet',
                'pet.nama',
                'pet.jenis_kelamin',
                'ras_hewan.nama_ras',
                'jenis_hewan.nama_jenis_hewan',
                'user.nama as nama_pemilik'
            )
            ->get();

        return view('resepsionis.pet.index', compact('pets'));
    }

    public function create()
    {
        $pemilik = DB::table('pemilik')
            ->join('user','pemilik.iduser','=','user.iduser')
            ->select('pemilik.idpemilik','user.nama')
            ->get();

        $ras = DB::table('ras_hewan')->get();

        return view('resepsionis.pet.create', compact('pemilik','ras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required',
            'tanggal_lahir' => 'required|date',
            'warna_tanda'   => 'required',
            'jenis_kelamin' => 'required',
            'idpemilik'     => 'required',
            'idras_hewan'   => 'required',
        ]);

        DB::table('pet')->insert([
            'nama'          => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda'   => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
            'idpemilik'     => $request->idpemilik,
            'idras_hewan'   => $request->idras_hewan,
        ]);

        return redirect()
            ->route('resepsionis.pet.index')
            ->with('success','Pet berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pet = DB::table('pet')->where('idpet',$id)->first();

        return view('resepsionis.pet.edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        DB::table('pet')->where('idpet',$id)->update([
            'nama'          => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda'   => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()
            ->route('resepsionis.pet.index')
            ->with('success','Pet berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::table('pet')->where('idpet',$id)->delete();

        return redirect()
            ->route('resepsionis.pet.index')
            ->with('success','Pet berhasil dihapus');
    }
}
