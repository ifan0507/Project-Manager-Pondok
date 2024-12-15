<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\admin\SantriController;
use App\Http\Controllers\client\AboutController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\IzinController;
use App\Http\Controllers\admin\profile\SejarahController;
use App\Http\Controllers\client\PendaftaranController;
use App\Http\Controllers\admin\profile\VisiMisiController;
use App\Http\Controllers\client\ClientVisiMisiController;
use App\Http\Controllers\client\ClientSejarahController;


// API GIT HUB
Route::get('/api/kabupaten/{provinceId}', function ($provinceId) {
    $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
    return $response->json();
});

Route::get('/api/kecamatan/{kabupatenId}', function ($kabupatenId) {
    $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/districts/{$kabupatenId}.json");
    return $response->json();
});

Route::get('/api/desa/{kecamatanId}', function ($kecamatanId) {
    $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/villages/{$kecamatanId}.json");
    return $response->json();
});


// Route Client
Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/profile/visi-misi', [ClientVisiMisiController::class, 'index'])->name('client.visi-misi');
    Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
    Route::post('/pendaftaran', [PendaftaranController::class, 'store']);
    Route::get('/profile/sejarah', [ClientSejarahController::class, 'index'])->name('client.sejarah');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});




Route::middleware(['auth', 'NoChace'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Route Santri
    Route::get('/santri', [SantriController::class, 'index'])->name('santri.index');
    Route::post('/santri/save', [SantriController::class, 'store']);
    Route::delete('/santri/{id}', [SantriController::class, 'destroy'])->name('santri.delete');
    Route::get('/santri/{id}', [SantriController::class, 'edit']);
    Route::put('/santri/{id}', [SantriController::class, 'update']);
    Route::get('/santri/detail/{id}', [SantriController::class, 'show']);
    Route::post('konfirmasi/{id}', [SantriController::class, 'konfirmasiPendaftaran'])->name('konfirmasi.pendaftaran');

    // Route Management Profile
    Route::get('/visi-misi', [VisiMisiController::class, 'index']);
    Route::post('/visi-misi/save', [VisiMisiController::class, 'store']);
    Route::delete('/visi-misi/{id}', [VisiMisiController::class, 'destroy'])->name('visiMisi.delete');
    Route::get('/visi-misi/{id}', [VisiMisiController::class, 'edit']);
    Route::put('/visi-misi/{id}', [VisiMisiController::class, 'update']);

    // Route Management Sejarah
    Route::get('/sejarah', [SejarahController::class, 'index']);
    Route::post('/sejarah/save', [SejarahController::class, 'store']);
    Route::delete('/sejarah/{id}', [SejarahController::class, 'destroy'])->name('sejarah.delete');
    Route::get('/sejarah/{id}', [SejarahController::class, 'edit']);
    Route::put('/sejarah/{id}', [SejarahController::class, 'update']);;

    // Route Izin Santri
    Route::get('/izin-santri', [IzinController::class, 'index'])->name('izin');
    Route::post('/izin-santri/create', [IzinController::class, 'create'])->name('izin-santri.form');
    Route::get('/izin-santri/form', [IzinController::class, 'showForm'])->name('form-izin');
    Route::post('/izin-santri/form', [IzinController::class, 'store'])->name('form-izin');
    Route::delete('/izin-santri/{id}', [IzinController::class, 'destroy'])->name('izin.delete');
    Route::post('/izin-santri/{id}', [IzinController::class, 'izinKembali'])->name('izinKembali');
    Route::get('/izin-santri/{id}', [IzinController::class, 'edit'])->name('izin.edit');
    Route::put('/izin-santri/{id}', [IzinController::class, 'update'])->name('form.update');
    Route::get('/izin-santri/{id}/export-pdf', [IzinController::class, 'exportPdf'])->name('izin.export-pdf');
});
