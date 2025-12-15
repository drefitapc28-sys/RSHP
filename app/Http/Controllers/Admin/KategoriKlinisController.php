<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KategoriKlinisController extends Controller
{
    // =======================
    // INDEX : Tampilkan semua data
    // =======================
    public function index()
    {
        $kategoriKlinis = DB::table('kategori_klinis')
            ->select('idkategori_klinis', 'nama_kategori_klinis')
            ->orderBy('idkategori_klinis', 'ASC')
            ->get();

        return view('Admin.Kategori-klinis.index', compact('kategoriKlinis'));
    }

    // =======================
    // CREATE : Form tambah data
    // =======================
    public function create()
    {
        return view('Admin.Kategori-klinis.create');
    }

    // =======================
    // STORE : Simpan data baru
    // =======================
    public function store(Request $request)
    {
        $this->validateKategoriKlinis($request);
        $this->createKategoriKlinis(['nama_kategori_klinis' => $request->nama_kategori_klinis]);

        return redirect()->route('admin.kategori-klinis.index')
                         ->with('success', 'Kategori klinis berhasil ditambahkan!');
    }

    // =======================
    // EDIT : Form edit data
    // =======================
    public function edit($id)
    {
        $kategoriKlinis = DB::table('kategori_klinis')->where('idkategori_klinis', $id)->first();

        if (!$kategoriKlinis) {
            return redirect()->route('admin.kategori-klinis.index')
                             ->with('error', 'Data kategori klinis tidak ditemukan.');
        }

        return view('Admin.Kategori-klinis.edit', compact('kategoriKlinis'));
    }

    // =======================
    // UPDATE : Simpan perubahan
    // =======================
    public function update(Request $request, $id)
    {
        $this->validateKategoriKlinis($request, $id);

        DB::table('kategori_klinis')->where('idkategori_klinis', $id)->update([
            'nama_kategori_klinis' => $this->formatNamaKategoriKlinis($request->nama_kategori_klinis),
        ]);

        return redirect()->route('admin.kategori-klinis.index')
                         ->with('success', 'Kategori klinis berhasil diperbarui!');
    }

    // =======================
    // DESTROY : Hapus data
    // =======================
    public function destroy($id)
    {
        DB::table('kategori_klinis')->where('idkategori_klinis', $id)->delete();
        return redirect()->route('admin.kategori-klinis.index')
                         ->with('success', 'Kategori klinis berhasil dihapus!');
    }

    // ==========================================================
    //  PROTECTED HELPER FUNCTIONS
    // ==========================================================
    protected function validateKategoriKlinis(Request $request, $id = null)
    {
        $rules = [
            'nama_kategori_klinis' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',
                'unique:kategori_klinis,nama_kategori_klinis,' . $id . ',idkategori_klinis',
            ],
        ];

        $messages = [
            'nama_kategori_klinis.required' => 'Nama kategori klinis wajib diisi.',
            'nama_kategori_klinis.string'   => 'Nama kategori klinis harus berupa teks.',
            'nama_kategori_klinis.min'      => 'Nama kategori klinis minimal :min karakter.',
            'nama_kategori_klinis.max'      => 'Nama kategori klinis maksimal :max karakter.',
            'nama_kategori_klinis.unique'   => 'Nama kategori klinis sudah terdaftar.',
            'nama_kategori_klinis.regex'    => 'Nama kategori klinis hanya boleh berisi huruf dan spasi.',
        ];

        $request->validate($rules, $messages);
    }

    // protected function createKategoriKlinis(array $data)
    // {
    //     DB::table('kategori_klinis')->insert([
    //         'nama_kategori_klinis' => $this->formatNamaKlinis($data['nama_kategori_klinis']),
    //     ]);
    // }
protected function createKategoriKlinis(array $data)
{
    try {
        // Ambil ID terakhir, lalu +1
        $lastId = DB::table('kategori_klinis')->max('idkategori_klinis');
        $newId = $lastId ? $lastId + 1 : 1;

        // Simpan data baru
        DB::table('kategori_klinis')->insert([
            'idkategori_klinis' => $newId,
            'nama_kategori_klinis' => $this->formatNamaKategoriKlinis($data['nama_kategori_klinis']),
        ]);

        return $newId;
    } catch (\Exception $e) {
        throw new \Exception('Gagal menyimpan kategori: ' . $e->getMessage());
    }
}

    // Helper format nama
    protected function formatNamaKategoriKlinis($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }
}
