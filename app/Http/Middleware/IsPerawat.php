<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsPerawat
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Ambil role aktif (status = 1)
        $role = $user->roleUser()->where('status', 1)->first();

        // Cek apakah idrole perawat (misal idrole = 3)
        if (!$role || $role->idrole != 3) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
