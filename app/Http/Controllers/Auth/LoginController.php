<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = trim($request->email);
        $password = $request->password;

        $user = DB::table('user')->where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan!');
        }

        if (!Hash::check($password, $user->password)) {
            return back()->with('error', 'Password salah!');
        }

        $role = DB::table('role_user')
            ->join('role', 'role.idrole', '=', 'role_user.idrole')
            ->where('role_user.iduser', $user->iduser)
            ->select('role.idrole', 'role.nama_role')
            ->first();

        Session::put('user', [
            'iduser' => $user->iduser,
            'nama' => $user->nama,
            'email' => $user->email,
            'role_id' => $role->idrole ?? 0,
            'role' => $role->nama_role ?? 'User',
        ]);

        if (($role->idrole ?? 0) == 1) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('login')->with('error', 'Hanya Admin yang bisa mengakses sistem ini.');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
