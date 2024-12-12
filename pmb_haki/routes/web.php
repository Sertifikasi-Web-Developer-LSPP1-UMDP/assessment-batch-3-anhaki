<?php

use App\Http\Controllers\AdmHomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerifAkunController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', [AdmHomeController::class, 'index'])->name('dashboard');
    Route::get('/verifakun', [VerifAkunController::class, 'index'])->name('verifakun');
    Route::patch('/user/{id}/toggle-status', [VerifAkunController::class, 'toggleStatus'])->name('user.toggleStatus');
});

Route::middleware(['auth', 'verified', 'nonMahasiswa'])->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
});



require __DIR__ . '/auth.php';
