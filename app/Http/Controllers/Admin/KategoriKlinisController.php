<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KategoriKlinisController extends Controller
{
    // ======= INDEX =======
    // Tampilkan semua data kategori klinis
    public function index()
    {
        $data = DB::table('kategori_klinis')->get();
        return view('Admin.Kategori-klinis.index', compact('data'));
    }

    // ======= CREATE =======
    // Form tambah data
    public function create()
    {
        return view('Admin.Kategori-klinis.create');
    }   

    // ======= STORE =======
    // Simpan data baru
    public function store(Request $request)
    {
        // Validasi pakai helper
        $this->validateKategoriKlinis($request);    

        // Simpan data pakai helper
        $this->createKategoriKlinis($request->nama_kategori);   
        return redirect()->route('admin.kategori-klinis.index')
                         ->with('success', 'Kategori klinis berhasil ditambahkan!');
    }

    // ======= EDIT =======
    // Form edit
    public function edit($id)
    {
        $kategoriKlinis = DB::table('kategori_klinis')->where('idkategori_klinis', $id)->first();
        return view('Admin.Kategori-klinis.edit', compact('kategoriKlinis'));
    }

    // ======= UPDATE =======
    // Update data kategori klinis
    public function update(Request $request, $id)
    {
        // Validasi pakai helper (lewati id yang sama)
        $this->validateKategoriKlinis($request, $id);
        // Format nama sebelum update
        $formattedNama = $this->formatNamaKategoriKlinis($request->nama_kategori);
        DB::table('kategori_klinis')->where('idkategori_klinis', $id)->update([
            'nama_kategori_klinis' => $formattedNama,
        ]);
        return redirect()->route('admin.kategori-klinis.index')
                         ->with('success', 'Kategori klinis berhasil diperbarui!');
    }

    // ======= DESTROY =======
    // Hapus data kategori klinis
    public function destroy($id)
    {
        DB::table('kategori_klinis')->where('idkategori_klinis', $id)->delete();
        return redirect()->route('admin.kategori-klinis.index')
                         ->with('success', 'Kategori klinis berhasil dihapus!');
    }

    // ======== PRIVATE HELPERS =======
   
    private function validateKategoriKlinis(Request $request, $id = null)
    {
         $rules = [
        'nama_kategori' => [
            'required',
            'string',
            'min:2',
            'max:100',
            'unique:kategori_klinis,nama_kategori_klinis,' . $id . ',idkategori_klinis',
            'regex:/^[A-Za-z\s]+$/'
        ],
    ];

        $messages = [
            'nama_kategori.required' => 'Nama kategori klinis wajib diisi.',
            'nama_kategori.string' => 'Nama kategori klinis harus berupa teks.',
            'nama_kategori.min' => 'Nama kategori klinis minimal :min karakter.',
            'nama_kategori.max' => 'Nama kategori klinis maksimal :max karakter.',
            'nama_kategori.unique' => 'Nama kategori klinis sudah ada dalam database.',
            'nama_kategori.regex' => 'Nama kategori klinis hanya boleh berisi huruf dan spasi.',
        ];

        $request->validate($rules, $messages);
    }

    // Helper: Simpan data kategori klinis
    private function createKategoriKlinis($namaKategori)
    {
        $formattedNama = $this->formatNamaKategoriKlinis($namaKategori);
        DB::table('kategori_klinis')->insert([
            'nama_kategori_klinis' => $formattedNama,
        ]);
    }

    // Helper: Format nama kategori klinis
    private function formatNamaKategoriKlinis($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }
}