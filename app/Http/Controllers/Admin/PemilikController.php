<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    // =======================
    // INDEX - Menampilkan data pemilik dengan relasi user
    // =======================
    public function index()
    {
        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select(
                'pemilik.*',
                'user.nama as user_nama',
                'user.email as user_email'
            )
            ->orderBy('idpemilik', 'ASC')
            ->get();

        return view('Admin.Pemilik.index', compact('pemilik'));
    }

    // =======================
    // CREATE - Form tambah pemilik
    // =======================
    public function create()
    {
        $users = DB::table('user')->get();
        return view('Admin.Pemilik.create', compact('users'));
    }

    // =======================
    // STORE - Simpan data baru
    // =======================
    public function store(Request $request)
    {
        $this->validatePemilik($request);
        $this->createPemilik($request);

        return redirect()->route('admin.pemilik.index')
                         ->with('success', 'Data pemilik berhasil ditambahkan!');
    }

    // =======================
    // EDIT - Form edit pemilik
    // =======================
    public function edit($id)
    {
        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        $users = DB::table('user')->get();

        if (!$pemilik) {
            return redirect()->route('admin.pemilik.index')
                             ->with('error', 'Data pemilik tidak ditemukan.');
        }

        return view('Admin.Pemilik.edit', compact('pemilik', 'users'));
    }

    // =======================
    // UPDATE - Simpan perubahan
    // =======================
    public function update(Request $request, $id)
    {
        $this->validatePemilik($request, $id);
        $this->updatePemilik($request, $id);

        return redirect()->route('admin.pemilik.index')
                         ->with('success', 'Data pemilik berhasil diperbarui!');
    }

    // =======================
    // DESTROY - Hapus data
    // =======================
    public function destroy($id)
    {
        DB::table('pemilik')->where('idpemilik', $id)->delete();

        return redirect()->route('admin.pemilik.index')
                         ->with('success', 'Data pemilik berhasil dihapus!');
    }

    // ======================================================
    // 🔹 PROTECTED HELPER FUNCTIONS
    // ======================================================
    protected function validatePemilik(Request $request, $id = null)
    {
        $rules = [
            'no_wa' => [
                'required',
                'string',
                'min:10',
                'max:15',
                'regex:/^[0-9]+$/',
            ],
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

    protected function createPemilik(Request $request)
    {
        $last = DB::table('pemilik')->orderBy('idpemilik', 'desc')->first();
        if ($last) {
            $newId = $last->idpemilik + 1;
        } else {
            $newId = 1;
        }
        DB::table('pemilik')->insert([
            'idpemilik' => $newId,
            'no_wa' => trim($request->no_wa),
            'alamat' => ucfirst(strtolower(trim($request->alamat))),
            'iduser' => $request->iduser,
        ]);
    }

    protected function updatePemilik(Request $request, $id)
    {
        DB::table('pemilik')->where('idpemilik', $id)->update([
            'no_wa' => trim($request->no_wa),
            'alamat' => ucfirst(strtolower(trim($request->alamat))),
            'iduser' => $request->iduser,
        ]);
    }
}
