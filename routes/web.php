<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SistemController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KontakController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Static Pages
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
Route::get('/fasilitas/{slug}', [FasilitasController::class, 'show'])->name('fasilitas.show');
Route::get('/program', [ProgramController::class, 'index'])->name('program');
Route::get('/program/{slug}', [ProgramController::class, 'show'])->name('program.show');
Route::get('/sistem', [SistemController::class, 'index'])->name('sistem');
Route::get('/sistem/{slug}', [SistemController::class, 'show'])->name('sistem.show');

// News Routes
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

// Contact Routes
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
