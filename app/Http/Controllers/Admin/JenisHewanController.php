<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JenisHewanController extends Controller
{
    // ======== INDEX =======
    public function index()
    {
        $data = DB::table('jenis_hewan')->get();
        return view('Admin.Jenis-hewan.index', compact('data'));
    }

    // ========= CREATE =======
    public function create()
    {
        return view('Admin.Jenis-hewan.create');
    }

    // ======== STORE =======
    // Simpan data baru
    public function store(Request $request)
    {
        //  Validasi input menggunakan helper
        $this->validateJenisHewan($request);

        //  Simpan data ke database menggunakan helper
        $this->createJenisHewan($request->nama_jenis_hewan);

        //  Redirect dengan pesan sukses
        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', 'Jenis hewan berhasil ditambahkan!');
    }

    // ========= EDIT =======
    public function edit($id)
    {
        $jenisHewan = DB::table('jenis_hewan')->where('idjenis_hewan', $id)->first();
        return view('Admin.Jenis-hewan.edit', compact('jenisHewan'));
    }

    // ======== UPDATE =======
    public function update(Request $request, $id)
    {
        //  Validasi input (lewati nama yang sama)
        $this->validateJenisHewan($request, $id);

        // Format nama sebelum update
        $formattedNama = $this->formatNamaJenis($request->nama_jenis_hewan);

        //  Update data
        DB::table('jenis_hewan')->where('idjenis_hewan', $id)->update([
            'nama_jenis_hewan' => $formattedNama,
        ]);

        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', 'Jenis hewan berhasil diperbarui!');
    }

    // ========= DELETE =======
    public function destroy($id)
    {
        DB::table('jenis_hewan')->where('idjenis_hewan', $id)->delete();
        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', 'Jenis hewan berhasil dihapus!');
    }

  
    //  ======== PRIVATE HELPERS =======

    private function validateJenisHewan(Request $request, $id = null)
    {
           $rules = [
        'nama_jenis_hewan' => [
            'required',
            'string',
            'min:2',
            'max:100',
            'unique:jenis_hewan,nama_jenis_hewan,' . $id . ',idjenis_hewan',
            'regex:/^[A-Za-z\s]+$/'
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

    // Fungsi helper untuk menyimpan data
    private function createJenisHewan($nama)
    {
        $formattedNama = $this->formatNamaJenis($nama);

        DB::table('jenis_hewan')->insert([
            'nama_jenis_hewan' => $formattedNama,
        ]);
    }

    // Fungsi helper untuk format nama
    private function formatNamaJenis($nama)
    {
        // Hilangkan spasi berlebih, ubah huruf kecil semua lalu kapital setiap kata
        return ucwords(strtolower(trim($nama)));
    }
}
