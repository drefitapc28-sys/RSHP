<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    // ===============================
    // INDEX
    // ===============================
    public function index()
    {
        $users = DB::table('user')
            ->select('iduser', 'nama', 'email')
            ->orderBy('iduser')
            ->get();

        foreach ($users as $user) {
            $user->roles = DB::table('role_user')
                ->join('role', 'role_user.idrole', '=', 'role.idrole')
                ->where('role_user.iduser', $user->iduser)
                ->select(
                    'role_user.idrole_user',
                    'role.nama_role',
                    'role_user.status'
                )
                ->get();
        }

        return view('admin.role_user.index', compact('users'));
    }

    // ===============================
    // CREATE
    // ===============================
    public function create()
    {
        $users = DB::table('user')->orderBy('nama')->get();
        $roles = DB::table('role')->orderBy('nama_role')->get();

        return view('admin.role_user.create', compact('users', 'roles'));
    }

    // ===============================
    // STORE
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
        ]);

        $exists = DB::table('role_user')
            ->where('iduser', $request->iduser)
            ->where('idrole', $request->idrole)
            ->exists();

        if ($exists) {
            return redirect()->route('admin.role_user.create')
                ->with('error', 'User sudah memiliki role ini.');
        }

        DB::table('role_user')->insert([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
            'status' => 1,
        ]);

        return redirect()->route('admin.role_user.index')
            ->with('success', 'Role berhasil ditambahkan.');
    }

    // ===============================
    // EDIT
    // ===============================
    public function edit($id)
    {
        $roleUser = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->where('role_user.idrole_user', $id)
            ->select(
                'role_user.idrole_user',
                'role_user.iduser',      
                'role_user.idrole',
                'role_user.status',
                'user.nama as nama_user',
                'role.nama_role'
            )
            ->first();

        if (!$roleUser) {
            return redirect()->route('admin.role_user.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('admin.role_user.edit', compact('roleUser'));
    }

    // ===============================
    // UPDATE
    // ===============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        DB::table('role_user')
            ->where('idrole_user', $id)
            ->update([
                'status' => $request->status
            ]);

        return redirect()->route('admin.role_user.index')
            ->with('success', 'Status role berhasil diperbarui.');
    }

    // ===============================
    // DELETE
    // ===============================
    public function destroy($idrole_user)
    {
        $roleUser = DB::table('role_user')->where('idrole_user', $idrole_user)->first();

        if (!$roleUser) {
            return redirect()->route('admin.role_user.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        DB::table('role_user')
            ->where('idrole_user', $idrole_user)
            ->delete();

        return redirect()->route('admin.role_user.index')
            ->with('success', 'Role berhasil dihapus dari user.');
    }
}
