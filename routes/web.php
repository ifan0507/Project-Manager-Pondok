<?php

use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\PendaftaranController;
use App\Http\Controllers\profil\SejarahController as ProfilSejarahController;
use App\Models\VisiMisi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\profil\VisiMisiController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.save');

Route::get('/dashboard', [WelcomeController::class, 'index']);

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

// Route Santri
Route::get('/santri', [SantriController::class, 'index']);
Route::post('/santri/save', [SantriController::class, 'store']);
Route::delete('/santri/{id}', [SantriController::class, 'destroy'])->name('santri.delete');
Route::get('/santri/{id}', [SantriController::class, 'edit']);
Route::put('/santri/{id}', [SantriController::class, 'update']);
Route::get('/santri/detail/{id}', [SantriController::class, 'show']);

// Route Management Profile
Route::get('/visi-misi', [VisiMisiController::class, 'index']);
Route::post('/visi-misi/save', [VisiMisiController::class, 'store']);
Route::delete('/visi-misi/{id}', [VisiMisiController::class, 'destroy'])->name('visiMisi.delete');
Route::get('/visi-misi/{id}', [VisiMisiController::class, 'edit']);
Route::put('/visi-misi/{id}', [VisiMisiController::class, 'update']);

// Route Management Sejarah
Route::get('/sejarah', [ProfilSejarahController::class, 'index']);
Route::post('/sejarah/save', [ProfilSejarahController::class, 'store']);
Route::delete('/sejarah/{id}', [ProfilSejarahController::class, 'destroy'])->name('sejarah.delete');
Route::get('/sejarah/{id}', [ProfilSejarahController::class, 'edit']);
Route::put('/sejarah/{id}', [ProfilSejarahController::class, 'update']);;
