<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KodeTindakanTerapiController extends Controller
{
    // ======== INDEX =======
    public function index()
    {
        // Menampilkan data dengan relasi kategori dan kategori klinis
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

    // ======== CREATE =======
    public function create()
    {
        // Mengambil data kategori dan kategori klinis untuk dropdown
        $kategori = DB::table('kategori')->get();
        $kategoriKlinis = DB::table('kategori_klinis')->get();

        return view('Admin.Kode-tindakan-terapi.create', compact('kategori', 'kategoriKlinis'));
    }

    // ======= STORE =======
    public function store(Request $request)
    {
        // Validasi input menggunakan helper
        $this->validateKodeTindakan($request);

        // Generate kode otomatis dan simpan data
        $this->createKodeTindakan($request);

        return redirect()->route('admin.kode-tindakan-terapi.index')
            ->with('success', 'Kode tindakan berhasil ditambahkan!');
    }

    // ====== EDIT =======
    public function edit($id)
    {
        // Ambil data utama dan data relasi untuk form edit
        $data = DB::table('kode_tindakan_terapi')->where('idkode_tindakan_terapi', $id)->first();
        $kategori = DB::table('kategori')->get();
        $kategoriKlinis = DB::table('kategori_klinis')->get();

        // Jika data tidak ditemukan
        if (!$data) {
            return redirect()->route('admin.kode-tindakan-terapi.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('Admin.Kode-tindakan-terapi.edit', compact('data', 'kategori', 'kategoriKlinis'));
    }

    // ======== UPDATE =======
    public function update(Request $request, $id)
    {
        // Validasi input
        $this->validateKodeTindakan($request, $id);

        // Update data ke database
        DB::table('kode_tindakan_terapi')->where('idkode_tindakan_terapi', $id)->update([
            'kode' => strtoupper(trim($request->kode)),
            'deskripsi_tindakan_terapi' => $this->formatDeskripsi($request->deskripsi_tindakan_terapi),
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()->route('admin.kode-tindakan-terapi.index')
            ->with('success', 'Kode tindakan berhasil diperbarui!');
    }

    // ======= DESTROY =======
    public function destroy($id)
    {
        // Hapus data berdasarkan ID
        DB::table('kode_tindakan_terapi')->where('idkode_tindakan_terapi', $id)->delete();

        return redirect()->route('admin.kode-tindakan-terapi.index')
            ->with('success', 'Kode tindakan berhasil dihapus!');
    }

    // ======= PRIVATE HELPERS =======

    // Fungsi validasi input
    private function validateKodeTindakan(Request $request, $id = null)
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
            'idkategori.integer' => 'ID kategori harus berupa angka.',
            'idkategori.exists' => 'Kategori yang dipilih tidak valid.',
            'idkategori_klinis.required' => 'Kategori klinis wajib dipilih.',
            'idkategori_klinis.integer' => 'ID kategori klinis harus berupa angka.',
            'idkategori_klinis.exists' => 'Kategori klinis yang dipilih tidak valid.',
        ];

        $request->validate($rules, $messages);
    }

    // Fungsi untuk membuat kode dan menyimpan data
    private function createKodeTindakan(Request $request)
    {
        // Ambil kode terakhir dari database
        $last = DB::table('kode_tindakan_terapi')
            ->orderBy('idkode_tindakan_terapi', 'desc')
            ->first();

        // Tentukan kode baru
        if (!$last) {
            $newCode = 'T01';
        } else {
            $lastNumber = intval(substr($last->kode, 1));
            $newNumber = $lastNumber + 1;
            $newCode = 'T' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        }

        // Simpan ke database
        DB::table('kode_tindakan_terapi')->insert([
            'kode' => $newCode,
            'deskripsi_tindakan_terapi' => $this->formatDeskripsi($request->deskripsi_tindakan_terapi),
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);
    }

    // Fungsi untuk format teks deskripsi
    private function formatDeskripsi($text)
    {
        return ucfirst(strtolower(trim($text)));
    }
}
