<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    // ======= INDEX =======
    public function index()
    {
        // Gabungkan tabel user agar nama dan email user bisa ditampilkan
        $data = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select(
                'pemilik.*',
                'user.nama as user_nama',
                'user.email as user_email'
            )
            ->orderBy('idpemilik', 'ASC')
            ->get();

        return view('Admin.Pemilik.index', compact('data'));
    }


    // ======= CREATE =======
    public function create()
    {
        // Ambil data user untuk dropdown (user pemilik)
        $users = DB::table('user')->get();
        return view('Admin.Pemilik.create', compact('users'));
    }

    // ======= STORE =======
    public function store(Request $request)
    {
        // Validasi data
        $this->validatePemilik($request);

        // Simpan data baru
        $this->createPemilik($request);

        return redirect()->route('admin.pemilik.index')
                         ->with('success', 'Data pemilik berhasil ditambahkan!');
    }

    // ======= EDIT =======
    public function edit($id)
    {
        // Ambil data pemilik dan semua user untuk dropdown
        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        $users = DB::table('user')->get();

        if (!$pemilik) {
            return redirect()->route('admin.pemilik.index')->with('error', 'Data pemilik tidak ditemukan.');
        }

        return view('Admin.Pemilik.edit', compact('pemilik', 'users'));
    }

    // ====== UPDATE =======
    public function update(Request $request, $id)
    {
        // Validasi input
        $this->validatePemilik($request, $id);

        // Update data
        $this->updatePemilik($request, $id);

        return redirect()->route('admin.pemilik.index')
                         ->with('success', 'Data pemilik berhasil diperbarui!');
    }

    // ====== DESTROY =======
    public function destroy($id)
    {
        DB::table('pemilik')->where('idpemilik', $id)->delete();

        return redirect()->route('admin.pemilik.index')
                         ->with('success', 'Data pemilik berhasil dihapus!');
    }

    // ======= PRIVATE HELPERS =======

    // Helper: Validasi data pemilik
    private function validatePemilik(Request $request, $id = null)
    {
        $rules = [
            'no_wa' => 'required|string|min:10|max:15|regex:/^[0-9]+$/',
            'alamat' => 'required|string|min:5|max:255',
            'iduser' => 'required|exists:user,iduser',
            
        ];

        $messages = [
            'no_wa.required' => 'Nomor WhatsApp wajib diisi.',
            'no_wa.string' => 'Nomor WhatsApp harus berupa teks.',
            'no_wa.min' => 'Nomor WhatsApp minimal :min karakter.',
            'no_wa.max' => 'Nomor WhatsApp maksimal :max karakter.',
            'no_wa.regex' => 'Nomor WhatsApp hanya boleh berisi angka.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.min' => 'Alamat minimal :min karakter.',
            'alamat.max' => 'Alamat maksimal :max karakter.',
            'iduser.required' => 'Silakan pilih user pemilik.',
            'iduser.exists' => 'User yang dipilih tidak valid.',
        ];

        $request->validate($rules, $messages);
    }

    // Helper: Simpan data pemilik baru
    private function createPemilik(Request $request)
    {
        DB::table('pemilik')->insert([
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'iduser' => $request->iduser,
        ]);
    }

    // Helper: Update data pemilik
    private function updatePemilik(Request $request, $id)
    {
        DB::table('pemilik')->where('idpemilik', $id)->update([
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'iduser' => $request->iduser,
        ]);
    }
}
