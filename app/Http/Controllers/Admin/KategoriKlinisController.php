<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $data = DB::table('kategori_klinis')->get();
        return view('Admin.Kategori-klinis.index', compact('data'));
    }
}
