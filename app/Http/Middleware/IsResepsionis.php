<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsResepsionis
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Ambil role aktif (status = 1)
        $role = $user->roleUser()->where('status', 1)->first();

        // Cek apakah idrole-nya resepsionis (misalnya idrole = 4)
        if (!$role || $role->idrole != 4) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
