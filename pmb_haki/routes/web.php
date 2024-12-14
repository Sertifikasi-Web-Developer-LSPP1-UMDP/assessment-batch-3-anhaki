<?php

use App\Http\Controllers\AdmHomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PendaftaranMhsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerifAkunController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;

Route::get('/', [WelcomeController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', [AdmHomeController::class, 'index'])->name('dashboard');
    Route::get('/verifakun', [VerifAkunController::class, 'index'])->name('verifakun');
    Route::patch('/user/{id}/toggle-status', [VerifAkunController::class, 'toggleStatus'])->name('user.toggleStatus');

    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::patch('/pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

    Route::get('/pendaftaranmhs', [PendaftaranMhsController::class, 'index'])->name('pendaftaranmhs.index');
    Route::patch('/mahasiswa/{id}/toggle-status', [PendaftaranMhsController::class, 'toggleStatus'])->name('mahasiswa.toggleStatus');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'nonMahasiswa'])->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
    // Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
});



require __DIR__ . '/auth.php';
