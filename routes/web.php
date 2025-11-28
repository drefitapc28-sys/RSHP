<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Auth\LoginController;

// ===================== ADMIN CONTROLLERS =====================
use App\Http\Controllers\Admin\{
    DashboardController,
    JenisHewanController,
    RasHewanController,
    KategoriController,
    KategoriKlinisController,
    KodeTindakanTerapiController,
    PetController,
    PemilikController,
    RoleController,
    RoleUserController,
    DokterController,
    PerawatController
};

// ===================== ROLE DASHBOARD CONTROLLERS =====================
use App\Http\Controllers\Dokter\DashboardDokterController;
use App\Http\Controllers\Dokter\DokterRekamMedisController;
use App\Http\Controllers\Dokter\DokterPetController;
use App\Http\Controllers\Dokter\DokterPemilikController;

use App\Http\Controllers\Perawat\DashboardPerawatController;
use App\Http\Controllers\Perawat\RekamMedisController;
use App\Http\Controllers\Perawat\PerawatPetController;
use App\Http\Controllers\Perawat\PerawatPemilikController;


use App\Http\Controllers\Resepsionis\DashboardResepsionisController;
use App\Http\Controllers\Resepsionis\TemuDokterController;
use App\Http\Controllers\Resepsionis\ResepsionisPetController;
use App\Http\Controllers\Resepsionis\ResepsionisPemilikController;

use App\Http\Controllers\Pemilik\DashboardPemilikController;
use App\Http\Controllers\Pemilik\PemilikPetController;
use App\Http\Controllers\Pemilik\PemilikReservasiController;
use App\Http\Controllers\Pemilik\PemilikRekamMedisController;



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
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN AREA (Data Master)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isAdministrator'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ========== Data Master ==========
    Route::controller(JenisHewanController::class)->group(function () {
        Route::get('/jenis-hewan', 'index')->name('jenis-hewan.index');
        Route::get('/jenis-hewan/create', 'create')->name('jenis-hewan.create');
        Route::post('/jenis-hewan/store', 'store')->name('jenis-hewan.store');
        Route::get('/jenis-hewan/edit/{id}', 'edit')->name('jenis-hewan.edit');
        Route::post('/jenis-hewan/update/{id}', 'update')->name('jenis-hewan.update');
        Route::delete('/jenis-hewan/delete/{id}', 'destroy')->name('jenis-hewan.delete');
    });

    Route::controller(RasHewanController::class)->group(function () {
        Route::get('/ras-hewan', 'index')->name('ras-hewan.index');
        Route::get('/ras-hewan/create', 'create')->name('ras-hewan.create');
        Route::post('/ras-hewan/store', 'store')->name('ras-hewan.store');
        Route::get('/ras-hewan/edit/{id}', 'edit')->name('ras-hewan.edit');
        Route::post('/ras-hewan/update/{id}', 'update')->name('ras-hewan.update');
        Route::delete('/ras-hewan/delete/{id}', 'destroy')->name('ras-hewan.delete');
    });

    Route::controller(KategoriController::class)->group(function () {
        Route::get('/kategori', 'index')->name('kategori.index');
        Route::get('/kategori/create', 'create')->name('kategori.create');
        Route::post('/kategori/store', 'store')->name('kategori.store');
        Route::get('/kategori/edit/{id}', 'edit')->name('kategori.edit');
        Route::post('/kategori/update/{id}', 'update')->name('kategori.update');
        Route::delete('/kategori/delete/{id}', 'destroy')->name('kategori.delete');
    });

    Route::controller(KategoriKlinisController::class)->group(function () {
        Route::get('/kategori-klinis', 'index')->name('kategori-klinis.index');
        Route::get('/kategori-klinis/create', 'create')->name('kategori-klinis.create');
        Route::post('/kategori-klinis/store', 'store')->name('kategori-klinis.store');
        Route::get('/kategori-klinis/edit/{id}', 'edit')->name('kategori-klinis.edit');
        Route::post('/kategori-klinis/update/{id}', 'update')->name('kategori-klinis.update');
        Route::delete('/kategori-klinis/delete/{id}', 'destroy')->name('kategori-klinis.delete');
    });

    Route::controller(KodeTindakanTerapiController::class)->group(function () {
        Route::get('/kode-tindakan-terapi', 'index')->name('kode-tindakan-terapi.index');
        Route::get('/kode-tindakan-terapi/create', 'create')->name('kode-tindakan-terapi.create');
        Route::post('/kode-tindakan-terapi/store', 'store')->name('kode-tindakan-terapi.store');
        Route::get('/kode-tindakan-terapi/edit/{id}', 'edit')->name('kode-tindakan-terapi.edit');
        Route::post('/kode-tindakan-terapi/update/{id}', 'update')->name('kode-tindakan-terapi.update');
        Route::delete('/kode-tindakan-terapi/delete/{id}', 'destroy')->name('kode-tindakan-terapi.delete');
    });

    Route::controller(PetController::class)->group(function () {
        Route::get('/pet', 'index')->name('pet.index');
        Route::get('/pet/create', 'create')->name('pet.create');
        Route::post('/pet/store', 'store')->name('pet.store');
        Route::get('/pet/edit/{id}', 'edit')->name('pet.edit');
        Route::post('/pet/update/{id}', 'update')->name('pet.update');
        Route::delete('/pet/delete/{id}', 'destroy')->name('pet.delete');
    });

    Route::controller(PemilikController::class)->group(function () {
        Route::get('/pemilik', 'index')->name('pemilik.index');
        Route::get('/pemilik/create', 'create')->name('pemilik.create');
        Route::post('/pemilik/store', 'store')->name('pemilik.store');
        Route::get('/pemilik/edit/{id}', 'edit')->name('pemilik.edit');
        Route::post('/pemilik/update/{id}', 'update')->name('pemilik.update');
        Route::delete('/pemilik/delete/{id}', 'destroy')->name('pemilik.delete');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/role', 'index')->name('role.index');
        Route::get('/role/create', 'create')->name('role.create');
        Route::post('/role/store', 'store')->name('role.store');
        Route::get('/role/edit/{id}', 'edit')->name('role.edit');
        Route::post('/role/update/{id}', 'update')->name('role.update');
        Route::delete('/role/delete/{id}', 'destroy')->name('role.delete');
    });

    Route::controller(RoleUserController::class)->group(function () {
        Route::get('/role-user', 'index')->name('role-user.index');
        Route::get('/role-user/create', 'create')->name('role-user.create');
        Route::post('/role-user/store', 'store')->name('role-user.store');
        Route::get('/role-user/edit/{id}', 'edit')->name('role-user.edit');
        Route::post('/role-user/update/{id}', 'update')->name('role-user.update');
        Route::delete('/role-user/delete/{id}', 'destroy')->name('role-user.delete');
    });

        // dokter
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
    Route::get('/dokter/form', [DokterController::class, 'form'])->name('dokter.form');
    Route::post('/dokter/store', [DokterController::class, 'store'])->name('dokter.store');

    Route::get('/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
    Route::post('/dokter/{id}/update', [DokterController::class, 'update'])->name('dokter.update');

    Route::get('/dokter/{id}/delete', [DokterController::class, 'delete'])->name('dokter.delete');

        // perawat
    Route::get('/perawat', [PerawatController::class, 'index'])->name('perawat.index');
    Route::get('/perawat/form', [PerawatController::class, 'form'])->name('perawat.form');
    Route::post('/perawat/store', [PerawatController::class, 'store'])->name('perawat.store');

    Route::get('/perawat/{id}/edit', [PerawatController::class, 'edit'])->name('perawat.edit');
    Route::post('/perawat/{id}/update', [PerawatController::class, 'update'])->name('perawat.update');

    Route::get('/perawat/{id}/delete', [PerawatController::class, 'delete'])->name('perawat.delete');


});



/*
|--------------------------------------------------------------------------
| DOKTER AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isDokter'])->group(function () {
    Route::get('/dokter/dashboard', [DashboardDokterController::class, 'index'])->name('dokter.dashboard');
    Route::get('/dokter/rekam', [DokterRekamMedisController::class, 'index'])->name('dokter.rekam.index');
    Route::get('dokter/rekam/{id}', [DokterRekamMedisController::class, 'show'])->name('dokter.rekam.show');
    Route::post('dokter/rekam/{id}/add-terapi', [DokterRekamMedisController::class, 'addTerapi'])->name('dokter.rekam.addTerapi');
    Route::post('dokter/rekam-medis/{id}/tindakan', [DokterRekamMedisController::class, 'storeTindakan'])->name('dokter.rekam.tindakan.store');
    Route::get('/dokter/pet', [DokterPetController::class, 'index'])->name('dokter.pet.index');
    Route::get('/dokter/pemilik', [DokterPemilikController::class, 'index'])->name('dokter.pemilik.index');
    Route::get('/dokter/profil', [DashboardDokterController::class, 'profil'])->name('dokter.profil');
});

/*
|--------------------------------------------------------------------------
| PERAWAT AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isPerawat'])->group(function () {
    Route::get('/perawat/dashboard', [DashboardPerawatController::class, 'index'])->name('perawat.dashboard');
    Route::get('/perawat/pemilik', [PerawatPemilikController::class, 'index'])->name('perawat.pemilik.index');
    Route::get('/perawat/pet', [PerawatPetController::class, 'index'])->name('perawat.pet.index');
    Route::get('/perawat/rekam-medis', [RekamMedisController::class,'index'])->name('perawat.rekam-medis.index');
    Route::get('/perawat/rekam-medis/create', [RekamMedisController::class,'create'])->name('perawat.rekam-medis.create');
    Route::get('/perawat/rekam-medis/{id}', [RekamMedisController::class,'show'])->name('perawat.rekam-medis.show');
    Route::post('/perawat/rekam-medis/store', [RekamMedisController::class,'store'])->name('perawat.rekam-medis.store');
    Route::get('/perawat/profil', [DashboardPerawatController::class, 'profil'])->name('perawat.profil');

});

/*
|--------------------------------------------------------------------------
| RESEPSIONIS AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isResepsionis'])->group(function () {
    Route::get('/resepsionis/dashboard', [DashboardResepsionisController::class, 'index'])->name('resepsionis.dashboard');
    Route::get('/resepsionis/pet', [ResepsionisPetController::class, 'index'])->name('resepsionis.pet.index');
    Route::get('/resepsionis/pemilik', [ResepsionisPemilikController::class, 'index'])->name('resepsionis.pemilik.index');
    Route::get('/resepsionis/temu-dokter', [TemuDokterController::class, 'index'])->name('resepsionis.temu-dokter');
    Route::post('/resepsionis/temu-dokter', [TemuDokterController::class, 'store'])->name('resepsionis.temu-dokter.store');
});

/*
|--------------------------------------------------------------------------
| PEMILIK AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isPemilik'])->group(function () {
    Route::get('/pemilik/dashboard', [DashboardPemilikController::class, 'index'])->name('pemilik.dashboard');
    Route::get('/pemilik/pet', [PemilikPetController::class, 'index'])->name('pemilik.pet.index');
    Route::get('/pemilik/reservasi', [PemilikReservasiController::class, 'index'])->name('pemilik.reservasi.index');
    Route::get('/pemilik/rekam-medis', [PemilikRekamMedisController::class, 'index'])->name('pemilik.rekam.index');
    Route::get('/pemilik/rekam-medis/{id}', [PemilikRekamMedisController::class, 'show'])->name('pemilik.rekam.show');
    Route::get('/pemilik/profil', [DashboardPemilikController::class, 'profil'])->name('pemilik.profil');
});