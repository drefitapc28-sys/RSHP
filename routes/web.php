<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KategoriKlinisController;
use App\Http\Controllers\Admin\KodeTindakanTerapiController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\PemilikController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\DataMasterController;

/*
|--------------------------------------------------------------------------
| ROUTE UMUM
|--------------------------------------------------------------------------
*/
Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/visi', [SiteController::class, 'visi'])->name('visi');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak');
Route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi'])->name('cek.koneksi');

/*
|--------------------------------------------------------------------------
| LOGIN & LOGOUT
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin/data-master', [DataMasterController::class, 'index'])->name('admin.data-master');
/*
|--------------------------------------------------------------------------
| ADMIN AREA (TANPA MIDDLEWARE)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Modul Data Master
    Route::get('/jenis-hewan', [JenisHewanController::class, 'index'])->name('jenis-hewan');
    Route::get('/ras-hewan', [RasHewanController::class, 'index'])->name('ras-hewan');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('kategori-klinis');
    Route::get('/kode-tindakan-terapi', [KodeTindakanTerapiController::class, 'index'])->name('kode-tindakan-terapi');
    Route::get('/pet', [PetController::class, 'index'])->name('pet');
    Route::get('/pemilik', [PemilikController::class, 'index'])->name('pemilik');
    Route::get('/role-user', [RoleUserController::class, 'index'])->name('role-user');

    // CRUD Role Lengkap
    Route::resource('role', RoleController::class)->names([
        'index'   => 'role.index',
        'create'  => 'role.create',
        'store'   => 'role.store',
        'edit'    => 'role.edit',
        'update'  => 'role.update',
        'destroy' => 'role.destroy',
    ]);
});
