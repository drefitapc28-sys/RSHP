<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RasHewanController extends Controller
{
    // ===============================
    // INDEX - Menampilkan semua ras hewan
    // ===============================
    public function index()
    {
        $rasHewan = \DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select(
                'ras_hewan.idras_hewan',
                'ras_hewan.nama_ras',
                'jenis_hewan.nama_jenis_hewan as nama_jenis'
            )
            ->orderBy('ras_hewan.idras_hewan', 'ASC')
            ->get ();

        return view('Admin.Ras-hewan.index', compact('rasHewan'));
    }


    // ===============================
    // CREATE - Form tambah ras
    // ===============================
    public function create()
    {
        $jenisHewans = DB::table('jenis_hewan')->select('idjenis_hewan', 'nama_jenis_hewan')->get();
        return view('Admin.Ras-hewan.create', compact('jenisHewans'));
    }

    // ===============================
    // STORE - Simpan ras baru
    // ===============================
    public function store(Request $request)
    {
        $this->validateRasHewan($request);
        $this->createRasHewan($request);
        return redirect()->route('admin.ras-hewan.index')
                         ->with('success', 'Ras hewan berhasil ditambahkan!');
    }

    // ===============================
    // EDIT - Form edit ras
    // ===============================
    public function edit($id)
    {
        $rasHewan = DB::table('ras_hewan')->where('idras_hewan', $id)->first();
        $jenisHewans = DB::table('jenis_hewan')->select('idjenis_hewan', 'nama_jenis_hewan')->get();

        if (!$rasHewan) {
            return redirect()->route('admin.ras-hewan.index')
                             ->with('error', 'Data ras hewan tidak ditemukan.');
        }

        return view('Admin.Ras-hewan.edit', compact('rasHewan', 'jenisHewans'));
    }

    // ===============================
    // UPDATE - Perbarui ras
    // ===============================
    public function update(Request $request, $id)
    {
        $this->validateRasHewan($request, $id);
        $this->updateRasHewan($request, $id);
        return redirect()->route('admin.ras-hewan.index')
                         ->with('success', 'Ras hewan berhasil diperbarui!');
    }

    // ===============================
    // DESTROY - Hapus ras
    // ===============================
    public function destroy($id)
    {
        DB::table('ras_hewan')->where('idras_hewan', $id)->delete();
        return redirect()->route('admin.ras-hewan.index')
                         ->with('success', 'Ras hewan berhasil dihapus!');
    }

    // ======================================================
    // PROTECTED HELPER FUNCTIONS
    // ======================================================

    // Validasi input
    protected function validateRasHewan(Request $request, $id = null)
    {
        $rules = [
            'nama_ras' => 'required|string|min:2|max:100|unique:ras_hewan,nama_ras,' . $id . ',idras_hewan',
            'idjenis_hewan' => 'required|integer|exists:jenis_hewan,idjenis_hewan',
        ];

        $messages = [
            'nama_ras.required' => 'Nama ras wajib diisi.',
            'nama_ras.unique' => 'Nama ras sudah ada.',
            'idjenis_hewan.required' => 'Jenis hewan wajib dipilih.',
            'idjenis_hewan.exists' => 'Jenis hewan yang dipilih tidak ditemukan.',
        ];

        $request->validate($rules, $messages);
    }

    // Simpan ras baru
    protected function createRasHewan(Request $request)
    {
        DB::table('ras_hewan')->insert([
            'nama_ras' => $this->formatNamaRas($request->nama_ras),
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);
    }

    // Update ras
    protected function updateRasHewan(Request $request, $id)
    {
        DB::table('ras_hewan')->where('idras_hewan', $id)->update([
            'nama_ras' => $this->formatNamaRas($request->nama_ras),
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);
    }

    // Format nama ras (contoh: “anjing persia” → “Anjing Persia”)
    protected function formatNamaRas($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }
}
