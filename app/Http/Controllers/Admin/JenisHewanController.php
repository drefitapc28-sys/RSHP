<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JenisHewanController extends Controller
{
    public function index()
    {
        $data = DB::table('jenis_hewan')->get();
        return view('Admin.Jenis-hewan.index', compact('data'));
    }
}
