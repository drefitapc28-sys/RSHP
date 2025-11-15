<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    // =====================================
    // INDEX → Menampilkan seluruh kategori
    // =====================================
    public function index()
    {
        $kategori = DB::table('kategori')
            ->select('idkategori', 'nama_kategori')
            ->orderBy('idkategori', 'ASC')
            ->get();

        return view('Admin.Kategori.index', compact('kategori'));
    }

    // =====================================
    // CREATE → Tampilkan form tambah
    // =====================================
    public function create()
    {
        return view('Admin.Kategori.create');
    }

    // =====================================
    // STORE → Simpan data baru
    // =====================================
    public function store(Request $request)
    {
        $this->validateKategori($request);
        $this->createKategori(['nama_kategori' => $request->nama_kategori]);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan!');
    }

    // =====================================
    // EDIT → Form ubah data
    // =====================================
    public function edit($id)
    {
        $kategori = DB::table('kategori')->where('idkategori', $id)->first();

        if (!$kategori) {
            return redirect()->route('admin.kategori.index')
                             ->with('error', 'Data kategori tidak ditemukan.');
        }

        return view('Admin.Kategori.edit', compact('kategori'));
    }

    // =====================================
    // UPDATE → Simpan perubahan
    // =====================================
    public function update(Request $request, $id)
    {
        $this->validateKategori($request, $id);
        $formattedNama = $this->formatNamaKategori($request->nama_kategori);

        DB::table('kategori')->where('idkategori', $id)->update([
            'nama_kategori' => $formattedNama,
        ]);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil diperbarui!');
    }

    // =====================================
    // DESTROY → Hapus data
    // =====================================
    public function destroy($id)
    {
        DB::table('kategori')->where('idkategori', $id)->delete();
        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil dihapus!');
    }

    // ======================================================
    // PROTECTED HELPER FUNCTIONS 
    // ======================================================

    // Validasi input kategori

    protected function validateKategori(Request $request, $id = null)
    {
        $rules = [
            'nama_kategori' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',
                'unique:kategori,nama_kategori,' . $id . ',idkategori',
            ],
        ];

        $messages = [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.string' => 'Nama kategori harus berupa teks.',
            'nama_kategori.min' => 'Nama kategori minimal :min karakter.',
            'nama_kategori.max' => 'Nama kategori maksimal :max karakter.',
            'nama_kategori.unique' => 'Nama kategori sudah ada dalam database.',
            'nama_kategori.regex' => 'Nama kategori hanya boleh berisi huruf dan spasi.',
        ];

        $request->validate($rules, $messages);
    }

    // Simpan data kategori baru
   
    // protected function createKategori(array $data)
    // {
    //     try {
    //         DB::table('kategori')->insert([
    //             'nama_kategori' => $this->formatNamaKategori($data['nama_kategori']),
    //         ]);
        
    //     return $kategori;
    //     } catch (\Exception $e) {
    //         throw new \Exception('Gagal menyimpan kategori: ' . $e->getMessage());
    //     }
    // }
    protected function createKategori(array $data)
{
    try {
        // Ambil ID terakhir, lalu +1
        $lastId = DB::table('kategori')->max('idkategori');
        $newId = $lastId ? $lastId + 1 : 1;

        // Simpan data baru
        DB::table('kategori')->insert([
            'idkategori' => $newId,
            'nama_kategori' => $this->formatNamaKategori($data['nama_kategori']),
        ]);

        return $newId;
    } catch (\Exception $e) {
        throw new \Exception('Gagal menyimpan kategori: ' . $e->getMessage());
    }
}
    // Helper format nama
    protected function formatNamaKategori($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }
}
