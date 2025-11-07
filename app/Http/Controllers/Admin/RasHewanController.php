<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RasHewanController extends Controller
{
    // ======= INDEX =======
    public function index()
    {
        $data = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select(
                'ras_hewan.idras_hewan',
                'ras_hewan.nama_ras',
                'jenis_hewan.nama_jenis_hewan'
            )
            ->orderBy('ras_hewan.idras_hewan', 'ASC')
            ->get();

        return view('Admin.Ras-hewan.index', compact('data'));
    }

    // ======== CREATE =======
    public function create()
    {
        $jenisHewan = DB::table('jenis_hewan')->get();
        return view('Admin.Ras-hewan.create', compact('jenisHewan'));
    }

    // ======== STORE =======
    public function store(Request $request)
    {
        // Panggil validasi helper
        $this->validateRasHewan($request);

        // Panggil helper penyimpanan
        $this->createRasHewan($request);

        return redirect()->route('admin.ras-hewan.index')
                         ->with('success', 'Ras hewan berhasil ditambahkan!');
    }

    // ======= Edit =======
    public function edit($id)
    {
        $rasHewan = DB::table('ras_hewan')->where('idras_hewan', $id)->first();
        $jenisHewan = DB::table('jenis_hewan')->get();

        if (!$rasHewan) {
            return redirect()->route('admin.ras-hewan.index')
                             ->with('error', 'Data ras hewan tidak ditemukan.');
        }

        return view('Admin.Ras-hewan.edit', compact('rasHewan', 'jenisHewan'));
    }

    // ====== UPDATE =======
    public function update(Request $request, $id)
    {
        // Validasi input
        $this->validateRasHewan($request, $id);

        // Panggil helper update
        $this->updateRasHewan($request, $id);

        return redirect()->route('admin.ras-hewan.index')
                         ->with('success', 'Ras hewan berhasil diperbarui!');
    }

    // ====== DESTROY =======
    public function destroy($id)
    {
        DB::table('ras_hewan')->where('idras_hewan', $id)->delete();

        return redirect()->route('admin.ras-hewan.index')
                         ->with('success', 'Ras hewan berhasil dihapus!');
    }

    // ======= PRIVATE HELPERS =======

    // VALIDASI
    private function validateRasHewan(Request $request, $id = null)
    {
        $rules = [
            'nama_ras' => 'required|string|min:2|max:100|unique:ras_hewan,nama_ras,' . $id . ',idras_hewan',
            'idjenis_hewan' => 'required|integer|exists:jenis_hewan,idjenis_hewan',
        ];

        $messages = [
            'nama_ras.required' => 'Nama ras wajib diisi.',
            'nama_ras.string' => 'Nama ras harus berupa teks.',
            'nama_ras.min' => 'Nama ras minimal :min karakter.',
            'nama_ras.max' => 'Nama ras maksimal :max karakter.',
            'nama_ras.unique' => 'Nama ras sudah ada.',
            'idjenis_hewan.required' => 'Jenis hewan wajib dipilih.',
            'idjenis_hewan.integer' => 'Jenis hewan tidak valid.',
            'idjenis_hewan.exists' => 'Jenis hewan yang dipilih tidak ada.',
        ];

        $request->validate($rules, $messages);
    }

    // HELPER: SIMPAN RAS BARU
    private function createRasHewan(Request $request)
    {
        $formattedNama = $this->formatNamaRas($request->nama_ras);

        DB::table('ras_hewan')->insert([
            'nama_ras' => $formattedNama,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);
    }

    // HELPER: UPDATE RAS
    private function updateRasHewan(Request $request, $id)
    {
        $formattedNama = $this->formatNamaRas($request->nama_ras);

        DB::table('ras_hewan')->where('idras_hewan', $id)->update([
            'nama_ras' => $formattedNama,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);
    }

    // HELPER: FORMAT NAMA RAS
    private function formatNamaRas($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }
}
