<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\MuridNilaiController;
use App\Http\Controllers\WaliNilaiController;
use App\Http\Controllers\Admin\AdminDashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });

    // Guru
    Route::middleware('role:guru')->group(function () {
        Route::get('/guru/dashboard', function () {
            return view('guru.dashboard');
        })->name('guru.dashboard');

        Route::resource('/guru/tugas', TugasController::class)->names([
            'index' => 'guru.tugas.index',
            'create' => 'guru.tugas.create',
            'store' => 'guru.tugas.store',
            'edit' => 'guru.tugas.edit',
            'update' => 'guru.tugas.update',
            'destroy' => 'guru.tugas.destroy',
            'show' => 'guru.tugas.show',
        ]);

        Route::get('/guru/nilai', [NilaiController::class, 'index'])->name('guru.nilai.index');
        Route::post('/guru/nilai', [NilaiController::class, 'store'])->name('guru.nilai.store');
    });

    // Murid
    Route::middleware('role:murid')->group(function () {
        Route::get('/murid/dashboard', function () {
            return 'Dashboard Murid';
        })->name('murid.dashboard');

        Route::get('/murid/nilai', [MuridNilaiController::class, 'index'])->name('murid.nilai');
    });

    // Wali
    Route::middleware('role:wali')->group(function () {
        Route::get('/wali/dashboard', function () {
            return 'Dashboard Wali Murid';
        })->name('wali.dashboard');

        Route::get('/wali/nilai', [WaliNilaiController::class, 'index'])->name('wali.nilai');
    });
});

require __DIR__.'/auth.php';