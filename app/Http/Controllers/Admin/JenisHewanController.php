<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JenisHewanController extends Controller
{
    // =====================================
    // INDEX → Menampilkan semua data
    // =====================================
    public function index()
    {
        // Query Builder (sesuai modul)
        $jenisHewan = DB::table('jenis_hewan')
            ->select('idjenis_hewan', 'nama_jenis_hewan')
            ->orderBy('idjenis_hewan', 'ASC')
            ->get ();

        return view('Admin.Jenis-hewan.index', compact('jenisHewan'));
    }

    // =====================================
    // CREATE → Tampilkan form tambah
    // =====================================
    public function create()
    {
        return view('Admin.Jenis-hewan.create');
    }

    // =====================================
    // STORE → Simpan data baru
    // =====================================
    public function store(Request $request)
    {
        // Validasi input menggunakan helper
        $this->validateJenisHewan($request);

        // Simpan data dengan helper
        $this->createJenisHewan([
            'nama_jenis_hewan' => $request->nama_jenis_hewan
        ]);

        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', 'Jenis hewan berhasil ditambahkan!');
    }

    // =====================================
    // EDIT → Form ubah data
    // =====================================
    public function edit($id)
    {
        $jenisHewan = DB::table('jenis_hewan')->where('idjenis_hewan', $id)->first();

        if (!$jenisHewan) {
            return redirect()->route('admin.jenis-hewan.index')
                             ->with('error', 'Data jenis hewan tidak ditemukan.');
        }

        return view('Admin.Jenis-hewan.edit', compact('jenisHewan'));
    }

    // =====================================
    // UPDATE → Simpan perubahan data
    // =====================================
    public function update(Request $request, $id)
    {
        // Validasi input (abaikan data lama untuk unik)
        $this->validateJenisHewan($request, $id);

        // Format nama
        $formattedNama = $this->formatNamaJenis($request->nama_jenis_hewan);

        // Update data ke database
        DB::table('jenis_hewan')->where('idjenis_hewan', $id)->update([
            'nama_jenis_hewan' => $formattedNama,
        ]);

        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', 'Jenis hewan berhasil diperbarui!');
    }

    // =====================================
    // DESTROY → Hapus data
    // =====================================
    public function destroy($id)
    {
        DB::table('jenis_hewan')->where('idjenis_hewan', $id)->delete();

        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', 'Jenis hewan berhasil dihapus!');
    }

    // ======================================================
    // PROTECTED HELPER FUNCTIONS 
    // ======================================================

    // Helper untuk validasi input jenis hewan
    
    protected function validateJenisHewan(Request $request, $id = null)
    {
        $rules = [
            'nama_jenis_hewan' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',
                'unique:jenis_hewan,nama_jenis_hewan,' . $id . ',idjenis_hewan',
            ],
        ];

        $messages = [
            'nama_jenis_hewan.required' => 'Nama jenis hewan wajib diisi.',
            'nama_jenis_hewan.string' => 'Nama jenis hewan harus berupa teks.',
            'nama_jenis_hewan.min' => 'Nama jenis hewan minimal :min karakter.',
            'nama_jenis_hewan.max' => 'Nama jenis hewan maksimal :max karakter.',
            'nama_jenis_hewan.unique' => 'Nama jenis hewan sudah ada.',
            'nama_jenis_hewan.regex' => 'Nama jenis hewan hanya boleh berisi huruf dan spasi.',
        ];

        $request->validate($rules, $messages);
    }

    // Helper untuk menyimpan data baru

    protected function createJenisHewan(array $data)
    {
        try {
            $jenisHewan = DB::table('jenis_hewan')->insert([
                'nama_jenis_hewan' => $this->formatNamaJenis($data['nama_jenis_hewan']),
            ]);
        
        return $jenisHewan;
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data jenis hewan: ' . $e->getMessage());
        }
    }

    // Helper untuk memformat nama (kapital tiap kata)

    protected function formatNamaJenis($nama)
    {
        // Hilangkan spasi berlebih dan ubah kapital setiap kata
        return ucwords(strtolower(trim($nama)));
    }
}
