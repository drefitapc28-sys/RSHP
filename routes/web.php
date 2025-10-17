<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteContoller;

Route::get('/', function () {
    return view('welcome');
});


route::get('home', [SiteContoller::class, 'index'])->name('home');
route::get('struktur', [SiteContoller::class, 'struktur'])->name('struktur');
route::get('layanan', [SiteContoller::class, 'layanan'])->name('layanan');
route::get('visi', [SiteContoller::class, 'visi'])->name('visi');
route::get('login', [SiteContoller::class, 'login'])->name('login');