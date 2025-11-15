<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // ===============================
    // INDEX - Menampilkan semua data hewan
    // ===============================
    public function index()
    {
        $pets = DB::table('pet')
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

        return view('Admin.Pet.index', compact('pets'));
    }

    // ===============================
    // CREATE - Form tambah data
    // ===============================
    public function create()
    {
        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.idpemilik', 'user.nama as nama_user')
            ->get();

        $ras = DB::table('ras_hewan')->select('idras_hewan', 'nama_ras')->get();

        return view('Admin.Pet.create', compact('pemilik', 'ras'));
    }

    // ===============================
    // STORE - Simpan data baru
    // ===============================
    public function store(Request $request)
    {
        $this->validatePet($request);

        $this->createPet($request->all());

        return redirect()->route('admin.pet.index')
                         ->with('success', 'Data hewan berhasil ditambahkan!');
    }

    // ===============================
    // EDIT - Form edit data
    // ===============================
    public function edit($id)
    {
        $pet = DB::table('pet')->where('idpet', $id)->first();

        if (!$pet) {
            return redirect()->route('admin.pet.index')
                             ->with('error', 'Data hewan tidak ditemukan.');
        }

        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.idpemilik', 'user.nama as nama_user')
            ->get();

        $ras = DB::table('ras_hewan')->select('idras_hewan', 'nama_ras')->get();

        return view('Admin.Pet.edit', compact('pet', 'pemilik', 'ras'));
    }

    // ===============================
    // UPDATE - Perbarui data
    // ===============================
    public function update(Request $request, $id)
    {
        $this->validatePet($request, $id);

        DB::table('pet')->where('idpet', $id)->update([
            'nama' => $this->formatNama($request->nama),
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda' => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan,
        ]);

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
    // PROTECTED HELPER FUNCTIONS
    // ======================================================

    protected function validatePet(Request $request, $id = null)
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
            'jenis_kelamin.in' => 'Jenis kelamin hanya boleh L (Jantan) atau P (Betina).',
            'idpemilik.exists' => 'Pemilik tidak ditemukan dalam database.',
            'idras_hewan.exists' => 'Ras hewan tidak ditemukan dalam database.',
        ];

        $request->validate($rules, $messages);
    }

    protected function createPet(array $data)
    {
        DB::table('pet')->insert([
            'nama' => $this->formatNama($data['nama']),
            'tanggal_lahir' => $data['tanggal_lahir'] ?? null,
            'warna_tanda' => $data['warna_tanda'] ?? null,
            'jenis_kelamin' => $data['jenis_kelamin'],
            'idpemilik' => $data['idpemilik'],
            'idras_hewan' => $data['idras_hewan'],
        ]);
    }

    protected function formatNama($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }
}
