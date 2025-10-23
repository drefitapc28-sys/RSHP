<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // 1. Menampilkan semua data
    public function index()
    {
        $data = DB::table('role')->get();
        return view('Admin.Role.index', compact('data'));
    }

    // 2. Form tambah role
    public function create()
    {
        return view('Admin.Role.create');
    }

    // 3. Simpan role baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|max:50',
        ]);

        DB::table('role')->insert([
            'nama_role' => $request->nama_role,
        ]);

        return redirect()->route('admin.role.index')->with('success', 'Role berhasil ditambahkan!');
    }

    // 4. Form edit role
    public function edit($id)
    {
        $role = DB::table('role')->where('idrole', $id)->first();
        return view('Admin.Role.edit', compact('role'));
    }

    // 5. Update data role
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_role' => 'required|max:50',
        ]);

        DB::table('role')->where('idrole', $id)->update([
            'nama_role' => $request->nama_role,
        ]);

        return redirect()->route('admin.role.index')->with('success', 'Role berhasil diperbarui!');
    }

    // 6. Hapus data role
    public function destroy($id)
    {
        DB::table('role')->where('idrole', $id)->delete();
        return redirect()->route('admin.role.index')->with('success', 'Role berhasil dihapus!');
    }
}
