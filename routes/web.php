<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\KontakController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Static Pages
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
Route::get('/program', [ProgramController::class, 'index'])->name('program');

// Contact Routes
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
