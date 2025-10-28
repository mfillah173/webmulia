<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SistemController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\GaleriProgramController;
use App\Http\Controllers\Admin\GaleriSistemController;
use App\Http\Controllers\Admin\GaleriFasilitasController;
use App\Http\Controllers\Admin\SyaratPendaftaranController;

// Admin Authentication Routes (tidak perlu middleware)
// Login routes
Route::get('/admin', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Admin Protected Routes (perlu middleware admin)
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Berita Management
    Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita']);
    Route::post('berita/{berita}/toggle-status', [BeritaController::class, 'toggleStatus'])->name('berita.toggle-status');

    // Kontak Management
    Route::get('kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('kontak/{kontak}', [KontakController::class, 'show'])->name('kontak.show');
    Route::post('kontak/{kontak}/mark-read', [KontakController::class, 'markAsRead'])->name('kontak.mark-read');
    Route::post('kontak/{kontak}/reply', [KontakController::class, 'reply'])->name('kontak.reply');
    Route::delete('kontak/{kontak}', [KontakController::class, 'destroy'])->name('kontak.destroy');

    // Program Management
    Route::resource('program', ProgramController::class);
    Route::post('program/{program}/toggle-status', [ProgramController::class, 'toggleStatus'])->name('program.toggle-status');

    // Sistem Management
    Route::resource('sistem', SistemController::class);
    Route::post('sistem/{sistem}/toggle-status', [SistemController::class, 'toggleStatus'])->name('sistem.toggle-status');

    // Fasilitas Management
    Route::resource('fasilitas', FasilitasController::class);
    Route::post('fasilitas/{fasilitas}/toggle-status', [FasilitasController::class, 'toggleStatus'])->name('fasilitas.toggle-status');

    // Galeri Program Management
    Route::resource('galeri-program', GaleriProgramController::class);
    Route::post('galeri-program/{galeriProgram}/toggle-status', [GaleriProgramController::class, 'toggleStatus'])->name('galeri-program.toggle-status');

    // Galeri Sistem Management
    Route::resource('galeri-sistem', GaleriSistemController::class);
    Route::post('galeri-sistem/{galeriSistem}/toggle-status', [GaleriSistemController::class, 'toggleStatus'])->name('galeri-sistem.toggle-status');

    // Galeri Fasilitas Management
    Route::resource('galeri-fasilitas', GaleriFasilitasController::class);
    Route::post('galeri-fasilitas/{galeriFasilitas}/toggle-status', [GaleriFasilitasController::class, 'toggleStatus'])->name('galeri-fasilitas.toggle-status');

    // Syarat Pendaftaran Management
    Route::resource('syarat-pendaftaran', SyaratPendaftaranController::class);
    Route::post('syarat-pendaftaran/{syaratPendaftaran}/toggle-status', [SyaratPendaftaranController::class, 'toggleStatus'])->name('syarat-pendaftaran.toggle-status');

    // Debug route untuk test upload
    Route::get('/debug-upload', function () {
        $directories = [
            'program' => storage_path('app/public/images/program'),
            'sistem' => storage_path('app/public/images/sistem'),
            'fasilitas' => storage_path('app/public/images/fasilitas'),
        ];

        $info = [];
        foreach ($directories as $name => $path) {
            $info[$name] = [
                'exists' => file_exists($path),
                'writable' => is_writable($path),
                'files' => file_exists($path) ? count(scandir($path)) - 2 : 0
            ];
        }

        return response()->json([
            'directories' => $info,
            'storage_link' => file_exists(public_path('storage')),
            'public_storage' => file_exists(public_path('storage/images'))
        ]);
    })->name('debug-upload');

    // Test upload route
    Route::get('/test-upload', function () {
        return view('admin.test-upload');
    })->name('test-upload');

    Route::post('/test-upload', function (\Illuminate\Http\Request $request) {
        try {
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();

                // Pastikan directory ada
                $directory = storage_path('app/public/images/program');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                // Upload file
                $gambar->move($directory, $gambarName);

                return redirect()->back()->with('success', 'File berhasil diupload: ' . $gambarName);
            } else {
                return redirect()->back()->with('error', 'Tidak ada file yang diupload');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    })->name('test-upload.post');
});
