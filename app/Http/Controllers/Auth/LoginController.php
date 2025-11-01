<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 🔹 1. Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // 🔹 2. Ambil user dengan relasi role aktif
        $user = User::with(['roleUser' => function ($query) {
            $query->where('status', 1);
        }, 'roleUser.role'])
            ->where('email', $request->input('email'))
            ->first();

        if (!$user) {
            return redirect()->back()
                ->withErrors(['email' => 'Email tidak ditemukan.'])
                ->withInput();
        }

        // 🔹 3. Verifikasi password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()
                ->withErrors(['password' => 'Password salah.'])
                ->withInput();
        }

        // 🔹 4. Login user ke session
        Auth::login($user);

        // 🔹 5. Ambil data role user
        $roleData = $user->roleUser[0] ?? null;
        $roleId = $roleData->idrole ?? null;

        // 🔹 6. Simpan informasi ke session
        $request->session()->put([
            'user_id' => $user->iduser,
            'user_name' => $user->nama,
            'user_email' => $user->email,
            'user_role' => $roleId,
            'user_status' => $roleData->status ?? 'inactive',
        ]);

        // 🔹 7. Redirect sesuai role
        switch ($roleId) {
            case 1:
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Login berhasil sebagai Administrator!');
            case 2:
                return redirect()->route('dokter.dashboard')
                    ->with('success', 'Login berhasil sebagai Dokter!');
            case 3:
                return redirect()->route('perawat.dashboard')
                    ->with('success', 'Login berhasil sebagai Perawat!');
            case 4:
                return redirect()->route('resepsionis.dashboard')
                    ->with('success', 'Login berhasil sebagai Resepsionis!');
            case 5:
                return redirect()->route('pemilik.dashboard')
                    ->with('success', 'Login berhasil sebagai Pemilik!');
            default:
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['role' => 'Role pengguna tidak dikenali.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
