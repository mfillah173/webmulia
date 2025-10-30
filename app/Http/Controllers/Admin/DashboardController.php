<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Admin;
use App\Models\Program;
use App\Models\Fasilitas;
use App\Models\Testimoni;
use App\Models\Faq;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik untuk dashboard
        $stats = [
            // Program
            'total_program' => Program::count(),

            // Fasilitas
            'total_fasilitas' => Fasilitas::count(),

            // Testimoni
            'total_testimoni' => Testimoni::count(),

            // FAQ
            'total_faq' => Faq::count(),

            // Kontak
            'total_kontak' => Kontak::count(),
            'kontak_unread' => Kontak::where('status', 'unread')->count(),
            'kontak_replied' => Kontak::where('status', 'replied')->count(),

            // Admin
            'total_admin' => Admin::count(),
            'admin_aktif' => Admin::where('is_active', true)->count(),
        ];

        // Data terbaru
        $recentProgram = Program::orderBy('created_at', 'desc')->limit(5)->get();
        $recentTestimoni = Testimoni::orderBy('created_at', 'desc')->limit(5)->get();
        $recentKontak = Kontak::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentProgram',
            'recentTestimoni',
            'recentKontak'
        ));
    }
}
