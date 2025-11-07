<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // ===============================
    // INDEX - Tampilkan semua data hewan
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
                'user.nama as nama_pemilik',
                'user.email as email_pemilik'
            )
            ->orderBy('pet.idpet', 'ASC')
            ->get();

        return view('Admin.Pet.index', compact('data'));
    }

    // ===============================
    // CREATE - Form tambah data hewan
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
    // STORE - Simpan data baru
    // ===============================
    public function store(Request $request)
    {
        // Panggil validasi helper
        $this->validatePet($request);

        // Panggil helper penyimpanan
        $this->createPet($request);

        return redirect()->route('admin.pet.index')
                         ->with('success', 'Hewan berhasil ditambahkan!');
    }

    // ===============================
    // EDIT - Form edit data hewan
    // ===============================
    public function edit($id)
    {
        $data = DB::table('pet')->where('idpet', $id)->first();

        if (!$data) {
            return redirect()->route('admin.pet.index')
                             ->with('error', 'Data hewan tidak ditemukan.');
        }

        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.idpemilik', 'user.nama')
            ->get();

        $ras = DB::table('ras_hewan')->select('idras_hewan', 'nama_ras')->get();

        return view('Admin.Pet.edit', compact('data', 'pemilik', 'ras'));
    }

    // ===============================
    // UPDATE - Perbarui data
    // ===============================
    public function update(Request $request, $id)
    {
        // Validasi data
        $this->validatePet($request, $id);

        // Panggil helper update
        $this->updatePet($request, $id);

        return redirect()->route('admin.pet.index')
                         ->with('success', 'Data hewan berhasil diperbarui!');
    }

    // ===============================
    // DESTROY - Hapus data
    // ===============================
    public function destroy($id)
    {
        DB::table('pet')->where('idpet', $id)->delete();

        return redirect()->route('admin.pet.index')
                         ->with('success', 'Data hewan berhasil dihapus!');
    }

    // ======================================================
    // PRIVATE HELPER FUNCTIONS
    // ======================================================

    // Validasi data pet
    private function validatePet(Request $request, $id = null)
    {
        $rules = [
            'nama' => 'required|string|min:2|max:100',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
        ];

        $messages = [
            'nama.required' => 'Nama hewan wajib diisi.',
            'nama.string' => 'Nama hewan harus berupa teks.',
            'nama.min' => 'Nama hewan minimal :min karakter.',
            'nama.max' => 'Nama hewan maksimal :max karakter.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa format tanggal yang valid.',
            'warna_tanda.string' => 'Warna/tanda harus berupa teks.',
            'warna_tanda.max' => 'Warna/tanda maksimal :max karakter.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin hanya boleh L (Jantan) atau P (Betina).',
            'idpemilik.required' => 'Pemilik wajib dipilih.',
            'idpemilik.exists' => 'Pemilik tidak ditemukan dalam database.',
            'idras_hewan.required' => 'Ras hewan wajib dipilih.',
            'idras_hewan.exists' => 'Ras hewan tidak ditemukan dalam database.',
        ];

        $request->validate($rules, $messages);
    }

    // Helper: Simpan data hewan baru
    private function createPet(Request $request)
    {
        DB::table('pet')->insert([
            'nama' => ucwords(strtolower(trim($request->nama))),
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda' => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan,
        ]);
    }

    // Helper: Update data hewan
    private function updatePet(Request $request, $id)
    {
        DB::table('pet')->where('idpet', $id)->update([
            'nama' => ucwords(strtolower(trim($request->nama))),
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda' => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan,
        ]);
    }
}
