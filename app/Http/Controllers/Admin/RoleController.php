<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // ========= INDEX =======
    public function index()
    {
        $data = DB::table('role')->orderBy('idrole', 'ASC')->get();
        return view('Admin.Role.index', compact('data'));
    }

    // ========= CREATE =======
    public function create()
    {
        return view('Admin.Role.create');
    }

    // ======== STORE =======
    public function store(Request $request)
    {
        // Validasi input
        $this->validateRole($request);

        // Simpan data
        $this->createRole($request);

        return redirect()->route('admin.role.index')
                         ->with('success', 'Role berhasil ditambahkan!');
    }

    // ======== EDIT =======
    public function edit($id)
    {
        $role = DB::table('role')->where('idrole', $id)->first();

        if (!$role) {
            return redirect()->route('admin.role.index')->with('error', 'Data role tidak ditemukan.');
        }

        return view('Admin.Role.edit', compact('role'));
    }

    // ======= UPDATE =======
    public function update(Request $request, $id)
    {
        // Validasi input
        $this->validateRole($request, $id);

        // Update data
        $this->updateRole($request, $id);

        return redirect()->route('admin.role.index')
                         ->with('success', 'Role berhasil diperbarui!');
    }

    // ======= DESTROY =======
    public function destroy($id)
    {
        DB::table('role')->where('idrole', $id)->delete();

        return redirect()->route('admin.role.index')
                         ->with('success', 'Role berhasil dihapus!');
    }

    // ======== PRIVATE HELPERS =======

    // Validasi data role
    private function validateRole(Request $request, $id = null)
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

    // Helper: Simpan role baru
    private function createRole(Request $request)
    {
        DB::table('role')->insert([
            'nama_role' => $this->formatNamaRole($request->nama_role),
        ]);
    }

    // Helper: Update role
    private function updateRole(Request $request, $id)
    {
        DB::table('role')->where('idrole', $id)->update([
            'nama_role' => $this->formatNamaRole($request->nama_role),
        ]);
    }

    // Helper: Format nama role (kapital di awal kata)
    private function formatNamaRole($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }
}
