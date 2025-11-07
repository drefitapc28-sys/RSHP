<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    // ========= INDEX =======
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
            ->orderBy('idrole_user', 'ASC')
            ->get();

        return view('Admin.Role-user.index', compact('data'));
    }

    // ========= CREATE =======
    public function create()
    {
        $roles = DB::table('role')->get();
        return view('Admin.Role-user.create', compact('roles'));
    }

    // ======== STORE =======
    public function store(Request $request)
    {
        $this->validateNewUserRole($request);

        $userId = $this->createUser($request);

        $this->createRoleUser($request, $userId);

        return redirect()->route('admin.role-user.index')
            ->with('success', 'User baru berhasil dibuat dan role berhasil ditambahkan!');
    }

    // ======== EDIT =======
    public function edit($id)
    {
        $data = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('idrole_user', $id)
            ->select('role_user.*', 'user.nama as user_nama', 'user.email as user_email')
            ->first();

        $roles = DB::table('role')->get();

        if (!$data) {
            return redirect()->route('admin.role-user.index')->with('error', 'Data tidak ditemukan.');
        }

        return view('Admin.Role-user.edit', compact('data', 'roles'));
    }

    // ======== UPDATE =======
    public function update(Request $request, $id)
    {
        // Validasi gabungan: user + role
        $this->validateEditUserRole($request, $id);

        // Update user & relasi role-user
        $this->updateUserAndRole($request, $id);

        return redirect()->route('admin.role-user.index')
            ->with('success', 'Data user dan role berhasil diperbarui!');
    }

    // ======== DESTROY =======
    public function destroy($id)
    {
        DB::table('role_user')->where('idrole_user', $id)->delete();
        return redirect()->route('admin.role-user.index')
            ->with('success', 'Relasi role-user berhasil dihapus.');
    }

    // ========= PRIVATE METHODS =======

    // Validasi tambah user + role
    private function validateNewUserRole(Request $request)
    {
        $rules = [
            'nama' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6|confirmed',
            'idrole' => 'required|exists:role,idrole',
            'status' => 'required|in:aktif,nonaktif',
        ];

        $messages = [
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'status.in' => 'Status hanya boleh aktif atau nonaktif.',
        ];

        $request->validate($rules, $messages);
    }

    // Validasi edit user + role
    private function validateEditUserRole(Request $request, $id)
    {
        $roleUser = DB::table('role_user')->where('idrole_user', $id)->first();

        $rules = [
            'nama' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:user,email,' . ($roleUser->iduser ?? 'NULL') . ',iduser',
            'password' => 'nullable|min:6',
            'idrole' => 'required|exists:role,idrole',
            'status' => 'required|in:aktif,nonaktif',
        ];

        $request->validate($rules);
    }

    // Simpan user baru
    private function createUser(Request $request)
    {
        return DB::table('user')->insertGetId([
            'nama' => ucwords(strtolower(trim($request->nama))),
            'email' => strtolower(trim($request->email)),
            'password' => bcrypt($request->password),
        ]);
    }

    // Simpan relasi role-user baru
    private function createRoleUser(Request $request, $userId)
    {
        $status = $request->status === 'aktif' ? 1 : 0;

        DB::table('role_user')->insert([
            'iduser' => $userId,
            'idrole' => $request->idrole,
            'status' => $status,
        ]);
    }

    // Update data user & relasi role-user
    private function updateUserAndRole(Request $request, $id)
    {
        $status = $request->status === 'aktif' ? 1 : 0;

        $roleUser = DB::table('role_user')->where('idrole_user', $id)->first();

        if ($roleUser) {
            // Update user
            $updateUser = [
                'nama' => ucwords(strtolower(trim($request->nama))),
                'email' => strtolower(trim($request->email)),
            ];

            if (!empty($request->password)) {
                $updateUser['password'] = bcrypt($request->password);
            }

            DB::table('user')->where('iduser', $roleUser->iduser)->update($updateUser);

            // Update relasi role
            DB::table('role_user')->where('idrole_user', $id)->update([
                'idrole' => $request->idrole,
                'status' => $status,
            ]);
        }
    }
}
