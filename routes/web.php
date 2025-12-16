<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Admin\AuthController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Static Pages
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
Route::get('/program', [ProgramController::class, 'index'])->name('program');

// Contact Routes
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

// Admin Authentication Routes (di web.php agar pasti ter-load)
Route::get('/admin', function () {
    return redirect()->route('admin.login');
});
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
