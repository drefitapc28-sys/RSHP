<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleUserController extends Controller
{
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
}
