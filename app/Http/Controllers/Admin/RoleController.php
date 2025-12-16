<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // ===============================
    // INDEX - Menampilkan semua role
    // ===============================
    public function index()
    {
        $roles = DB::table('role')
            ->orderBy('idrole', 'ASC')
            ->get();

        return view('Admin.Role.index', compact('roles'));
    }

    // ===============================
    // CREATE - Form tambah role
    // ===============================
    public function create()
    {
        return view('Admin.Role.create');
    }

    // ===============================
    // STORE - Simpan role baru
    // ===============================
    public function store(Request $request)
    {
        $this->validateRole($request);
        $this->createRole($request);

        return redirect()->route('admin.role.index')
                         ->with('success', 'Role berhasil ditambahkan!');
    }

    // ===============================
    // EDIT - Form edit role
    // ===============================
    public function edit($id)
    {
        $role = DB::table('role')->where('idrole', $id)->first();

        if (!$role) {
            return redirect()->route('admin.role.index')
                             ->with('error', 'Data role tidak ditemukan.');
        }

        return view('Admin.Role.edit', compact('role'));
    }

    // ===============================
    // UPDATE - Perbarui role
    // ===============================
    public function update(Request $request, $id)
    {
        $this->validateRole($request, $id);
        $this->updateRole($request, $id);

        return redirect()->route('admin.role.index')
                         ->with('success', 'Role berhasil diperbarui!');
    }

    // ===============================
    // DESTROY - Hapus role
    // ===============================
    public function destroy($id)
    {
        DB::table('role')->where('idrole', $id)->delete();

        return redirect()->route('admin.role.index')
                         ->with('success', 'Role berhasil dihapus!');
    }

    // ======================================================
    // PROTECTED HELPER FUNCTIONS
    // ======================================================

    // Validasi data role
    protected function validateRole(Request $request, $id = null)
    {
        $rules = [
            'nama_role' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'unique:role,nama_role,' . $id . ',idrole',
                'regex:/^[A-Za-z\s]+$/'
            ],
        ];

        $messages = [
            'nama_role.required' => 'Nama role wajib diisi.',
            'nama_role.string' => 'Nama role harus berupa teks.',
            'nama_role.min' => 'Nama role minimal :min karakter.',
            'nama_role.max' => 'Nama role maksimal :max karakter.',
            'nama_role.unique' => 'Nama role sudah ada dalam database.',
            'nama_role.regex' => 'Nama role hanya boleh berisi huruf dan spasi.',
        ];

        $request->validate($rules, $messages);
    }

    // Simpan role baru
    protected function createRole(Request $request)
    {
        DB::table('role')->insert([
            'nama_role' => $this->formatNamaRole($request->nama_role),
        ]);
    }

    // Update role
    protected function updateRole(Request $request, $id)
    {
        DB::table('role')->where('idrole', $id)->update([
            'nama_role' => $this->formatNamaRole($request->nama_role),
        ]);
    }

    // Format nama role agar kapital di awal kata
    protected function formatNamaRole($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }
}