<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KategoriKlinisController;
use App\Http\Controllers\Admin\KodeTindakanTerapiController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\PemilikController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoleUserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/visi', [SiteController::class, 'visi'])->name('visi');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak');
Route::get('/login', [SiteController::class, 'login'])->name('login');
Route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi'])->name('cek.koneksi');

// Routes Admin
Route::get('/admin/Jenis-hewan', [JenisHewanController::class, 'index'])->name('admin.jenis-hewan');
Route::get('/admin/Kode-tindakan-terapi',  [KodeTindakanTerapiController::class, 'index'])->name('admin.kode-tindakan-terapi');
Route::get('/admin/Pet', [PetController::class, 'index'])->name('admin.pet');
Route::get('/admin/Ras-hewan', [RasHewanController::class, 'index'])->name('admin.ras-hewan');
Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
Route::get('/admin/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis');
Route::get('/admin/pemilik', [PemilikController::class, 'index'])->name('admin.pemilik');
Route::get('/admin/role-user', [RoleUserController::class, 'index'])->name('admin.role-user');

Route::prefix('admin')->group(function () {
    Route::resource('role', RoleController::class)->names([
        'index' => 'admin.role.index',
        'create' => 'admin.role.create',
        'store' => 'admin.role.store',
        'edit' => 'admin.role.edit',
        'update' => 'admin.role.update',
        'destroy' => 'admin.role.destroy',
    ]);
});
