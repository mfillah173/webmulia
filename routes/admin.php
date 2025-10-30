<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\FaqController;

// Admin Authentication Routes (tidak perlu middleware)
// Login routes
Route::get('/admin', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Admin Protected Routes (perlu middleware admin)
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kontak (Informasi Kontak) Management
    Route::get('kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::post('kontak/update', [KontakController::class, 'update'])->name('kontak.update');

    // Program Management
    Route::resource('program', ProgramController::class);

    // Fasilitas Management
    Route::resource('fasilitas', FasilitasController::class);

    // Testimoni Management
    Route::resource('testimoni', TestimoniController::class);

    // FAQ Management
    Route::resource('faq', FaqController::class);
});
