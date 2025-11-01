<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    // 🔹 INDEX
    public function index()
    {
        $data = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->select(
                'role_user.*',
                'user.nama as user_nama',
                'user.email as user_email',
                'role.nama_role'
            )
            ->get();

        return view('Admin.Role-user.index', compact('data'));
    }

    // 🔹 CREATE
    public function create()
    {
        $users = DB::table('user')->get();
        $roles = DB::table('role')->get();
        return view('Admin.Role-user.create', compact('users', 'roles'));
    }

    // 🔹 STORE
    public function store(Request $request)
    {
        DB::table('role_user')->insert([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.role-user.index')->with('success', 'Relasi role-user berhasil ditambahkan.');
    }

    // 🔹 EDIT
    public function edit($id)
    {
        $data = DB::table('role_user')->where('idrole_user', $id)->first();
        $users = DB::table('user')->get();
        $roles = DB::table('role')->get();

        return view('Admin.Role-user.edit', compact('data', 'users', 'roles'));
    }

    // 🔹 UPDATE
    public function update(Request $request, $id)
    {
        DB::table('role_user')->where('idrole_user', $id)->update([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.role-user.index')->with('success', 'Relasi role-user berhasil diperbarui.');
    }

    // 🔹 DELETE
    public function delete($id)
    {
        DB::table('role_user')->where('idrole_user', $id)->delete();

        return redirect()->route('admin.role-user.index')->with('success', 'Relasi role-user berhasil dihapus.');
    }
}
