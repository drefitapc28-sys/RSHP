<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KodeTindakanTerapiController extends Controller
{
    // =======================
    // INDEX - Tampilkan semua data
    // =======================
    public function index()
    {
        $kodeTindakan = DB::table('kode_tindakan_terapi')
            ->join('kategori', 'kode_tindakan_terapi.idkategori', '=', 'kategori.idkategori')
            ->join('kategori_klinis', 'kode_tindakan_terapi.idkategori_klinis', '=', 'kategori_klinis.idkategori_klinis')
            ->select(
                'kode_tindakan_terapi.*',
                'kategori.nama_kategori',
                'kategori_klinis.nama_kategori_klinis'
            )
            ->orderBy('idkode_tindakan_terapi', 'ASC')
            ->get();

        return view('Admin.Kode-tindakan-terapi.index', compact('kodeTindakan'));
    }

    // =======================
    // CREATE - Form tambah data
    // =======================
    public function create()
    {
        $kategori = DB::table('kategori')->get();
        $kategoriKlinis = DB::table('kategori_klinis')->get();
        return view('Admin.Kode-tindakan-terapi.create', compact('kategori', 'kategoriKlinis'));
    }

    // =======================
    // STORE - Simpan data baru
    // =======================
    public function store(Request $request)
    {
        $this->validateKodeTindakan($request);
        $this->createKodeTindakan($request);

        return redirect()->route('admin.kode-tindakan-terapi.index')
            ->with('success', 'Kode tindakan terapi berhasil ditambahkan!');
    }

    // =======================
    // EDIT - Form edit data
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
    // UPDATE - Simpan perubahan
    // =======================
    public function update(Request $request, $id)
    {
        $this->validateKodeTindakan($request, $id);

        DB::table('kode_tindakan_terapi')->where('idkode_tindakan_terapi', $id)->update([
            'kode' => strtoupper(trim($request->kode)),
            'deskripsi_tindakan_terapi' => $this->formatDeskripsi($request->deskripsi_tindakan_terapi),
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()->route('admin.kode-tindakan-terapi.index')
            ->with('success', 'Kode tindakan terapi berhasil diperbarui!');
    }

    // =======================
    // DESTROY - Hapus data
    // =======================
    public function destroy($id)
    {
        DB::table('kode_tindakan_terapi')->where('idkode_tindakan_terapi', $id)->delete();

        return redirect()->route('admin.kode-tindakan-terapi.index')
            ->with('success', 'Kode tindakan terapi berhasil dihapus!');
    }

    // =====================================================
    // PROTECTED HELPER FUNCTIONS
    // =====================================================
    protected function validateKodeTindakan(Request $request, $id = null)
    {
        $rules = [
            'deskripsi_tindakan_terapi' => 'required|string|min:5|max:255',
            'idkategori' => 'required|integer|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|integer|exists:kategori_klinis,idkategori_klinis',
        ];

        $messages = [
            'deskripsi_tindakan_terapi.required' => 'Deskripsi tindakan wajib diisi.',
            'deskripsi_tindakan_terapi.string' => 'Deskripsi harus berupa teks.',
            'deskripsi_tindakan_terapi.min' => 'Deskripsi minimal :min karakter.',
            'deskripsi_tindakan_terapi.max' => 'Deskripsi maksimal :max karakter.',
            'idkategori.required' => 'Kategori wajib dipilih.',
            'idkategori.exists' => 'Kategori yang dipilih tidak valid.',
            'idkategori_klinis.required' => 'Kategori klinis wajib dipilih.',
            'idkategori_klinis.exists' => 'Kategori klinis yang dipilih tidak valid.',
        ];

        $request->validate($rules, $messages);
    }

    protected function createKodeTindakan(Request $request)
    {
        $last = DB::table('kode_tindakan_terapi')->orderBy('idkode_tindakan_terapi', 'desc')->first();

        if (!$last) {
            $newCode = 'T01';
        } else {
            $lastNumber = intval(substr($last->kode, 1));
            $newNumber = $lastNumber + 1;
            $newCode = 'T' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        }

        DB::table('kode_tindakan_terapi')->insert([
            'kode' => $newCode,
            'deskripsi_tindakan_terapi' => $this->formatDeskripsi($request->deskripsi_tindakan_terapi),
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);
    }

    protected function formatDeskripsi($text)
    {
        return ucfirst(strtolower(trim($text)));
    }
}
