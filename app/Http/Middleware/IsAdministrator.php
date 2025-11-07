<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class IsAdministrator
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Ambil semua idrole dari tabel role_user
        $roles = DB::table('role_user')
            ->where('iduser', Auth::id())
            ->pluck('idrole')
            ->toArray();

        // Cek apakah termasuk role admin (misal idrole = 1)
        if (in_array(1, $roles)) {
            return $next($request);
        }
  
        return back()->with('error', 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
