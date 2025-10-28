<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kontak;
use App\Models\Admin;
use App\Models\Program;
use App\Models\Sistem;
use App\Models\Fasilitas;
use App\Models\GaleriProgram;
use App\Models\GaleriSistem;
use App\Models\GaleriFasilitas;
use App\Models\SyaratPendaftaran;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik untuk dashboard
        $stats = [
            // Berita
            'total_berita' => Berita::count(),
            'berita_aktif' => Berita::where('status', 'active')->count(),
            'berita_draft' => Berita::where('status', 'inactive')->count(),

            // Program
            'total_program' => Program::count(),
            'program_aktif' => Program::where('status', 'active')->count(),

            // Sistem
            'total_sistem' => Sistem::count(),
            'sistem_aktif' => Sistem::where('status', 'active')->count(),

            // Fasilitas
            'total_fasilitas' => Fasilitas::count(),
            'fasilitas_aktif' => Fasilitas::where('status', 'active')->count(),

            // Galeri
            'total_galeri_program' => GaleriProgram::count(),
            'galeri_program_aktif' => GaleriProgram::where('status', 'active')->count(),

            'total_galeri_sistem' => GaleriSistem::count(),
            'galeri_sistem_aktif' => GaleriSistem::where('status', 'active')->count(),

            'total_galeri_fasilitas' => GaleriFasilitas::count(),
            'galeri_fasilitas_aktif' => GaleriFasilitas::where('status', 'active')->count(),

            // Syarat Pendaftaran
            'total_syarat' => SyaratPendaftaran::count(),
            'syarat_aktif' => SyaratPendaftaran::where('status', 'active')->count(),

            // Kontak
            'total_kontak' => Kontak::count(),
            'kontak_unread' => Kontak::where('status', 'unread')->count(),
            'kontak_replied' => Kontak::where('status', 'replied')->count(),

            // Admin
            'total_admin' => Admin::count(),
            'admin_aktif' => Admin::where('is_active', true)->count(),
        ];

        // Data terbaru
        $recentBerita = Berita::orderBy('created_at', 'desc')->limit(5)->get();
        $recentKontak = Kontak::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentBerita',
            'recentKontak'
        ));
    }
}
