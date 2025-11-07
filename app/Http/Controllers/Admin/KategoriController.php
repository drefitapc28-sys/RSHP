<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    // ======= INDEX =======
    public function index()
    {
        $data = DB::table('kategori')->get();
        return view('Admin.Kategori.index', compact('data'));
    }

    // ====== CREATE =======
    public function create()
    {
        return view('Admin.Kategori.create');
    }

    // ======= STORE =======
    public function store(Request $request)
    {
        // Validasi pakai helper
        $this->validateKategori($request);

        // Simpan data pakai helper
        $this->createKategori($request->nama_kategori);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan!');
    }

    // ======= EDIT =======
    public function edit($id)
    {
        $kategori = DB::table('kategori')->where('idkategori', $id)->first();
        return view('Admin.Kategori.edit', compact('kategori'));
    }

    // ======= UPDATE =======
    public function update(Request $request, $id)
    {
        // Validasi pakai helper (lewati id yang sama)
        $this->validateKategori($request, $id);

        // Format nama sebelum update
        $formattedNama = $this->formatNamaKategori($request->nama_kategori);

        DB::table('kategori')->where('idkategori', $id)->update([
            'nama_kategori' => $formattedNama,
        ]);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil diperbarui!');
    }

    // ======= DESTROY =======
    public function destroy($id)
    {
        DB::table('kategori')->where('idkategori', $id)->delete();
        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil dihapus!');
    }

    
    // ======= PRIVATE HELPERS =======

    private function validateKategori(Request $request, $id = null)
    {
         $rules = [
        'nama_kategori' => [
            'required',
            'string',
            'min:2',
            'max:100',
            'unique:kategori,nama_kategori,' . $id . ',idkategori',
            'regex:/^[A-Za-z\s]+$/'
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

    // Helper: Menyimpan kategori baru
    private function createKategori($nama)
    {
        $formattedNama = $this->formatNamaKategori($nama);

        DB::table('kategori')->insert([
            'nama_kategori' => $formattedNama,
        ]);
    }

    // Helper: Format nama kategori
    private function formatNamaKategori($nama)
    {
        // Hilangkan spasi berlebih, ubah ke huruf kecil lalu kapital setiap kata
        return ucwords(strtolower(trim($nama)));
    }
}
