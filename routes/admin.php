<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MediaLibraryController;

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
    Route::get('fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
    Route::get('fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
    Route::post('fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
    Route::get('fasilitas/{id}', [FasilitasController::class, 'show'])->name('fasilitas.show');
    Route::get('fasilitas/{id}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
    Route::put('fasilitas/{id}', [FasilitasController::class, 'update'])->name('fasilitas.update');
    Route::delete('fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');

    // Testimoni Management
    Route::resource('testimoni', TestimoniController::class);

    // Media Library
    Route::get('media-library', [MediaLibraryController::class, 'index'])->name('media-library.index');
    Route::get('media-library/grid', [MediaLibraryController::class, 'grid'])->name('media-library.grid');
    Route::post('media-library', [MediaLibraryController::class, 'store'])->name('media-library.store');
    Route::delete('media-library/delete', [MediaLibraryController::class, 'delete'])->name('media-library.delete');

    // FAQ Management
    Route::resource('faq', FaqController::class);

    // Banner Management
    Route::resource('banner', App\Http\Controllers\Admin\BannerController::class);
});
