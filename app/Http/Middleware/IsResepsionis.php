<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsResepsionis
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Cek apakah user memiliki role "Resepsionis" yang aktif
        $hasRole = $user->roleUser()
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->where('role_user.status', 1)
            ->where('role.nama_role', 'Resepsionis')
            ->exists();

        if (!$hasRole) {
            abort(403, 'Gagal! Akses ditolak. Anda bukan Resepsionis.');
        }

        return $next($request);
    }
}
