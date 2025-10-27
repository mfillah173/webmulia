<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KontakController;

// Admin Authentication Routes (tidak perlu middleware)
Route::prefix('admin')->name('admin.')->group(function () {
    // Login routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Protected Routes (perlu middleware admin)
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Berita Management
    Route::resource('berita', BeritaController::class);
    Route::post('berita/{berita}/toggle-status', [BeritaController::class, 'toggleStatus'])->name('berita.toggle-status');

    // Kontak Management
    Route::get('kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('kontak/{kontak}', [KontakController::class, 'show'])->name('kontak.show');
    Route::post('kontak/{kontak}/mark-read', [KontakController::class, 'markAsRead'])->name('kontak.mark-read');
    Route::post('kontak/{kontak}/reply', [KontakController::class, 'reply'])->name('kontak.reply');
    Route::delete('kontak/{kontak}', [KontakController::class, 'destroy'])->name('kontak.destroy');
});
