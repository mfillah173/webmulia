<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kontak;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik untuk dashboard
        $stats = [
            'total_berita' => Berita::count(),
            'berita_aktif' => Berita::where('status', 'active')->count(),
            'berita_draft' => Berita::where('status', 'draft')->count(),
            'total_kontak' => Kontak::count(),
            'kontak_unread' => Kontak::where('status', 'unread')->count(),
            'kontak_replied' => Kontak::where('status', 'replied')->count(),
            'total_admin' => Admin::count(),
            'admin_aktif' => Admin::where('is_active', true)->count(),
        ];

        // Berita terbaru
        $berita_terbaru = Berita::orderBy('created_at', 'desc')->limit(5)->get();

        // Kontak terbaru
        $kontak_terbaru = Kontak::orderBy('created_at', 'desc')->limit(5)->get();

        // Statistik bulanan
        $berita_bulanan = Berita::whereMonth('created_at', now()->month)->count();
        $kontak_bulanan = Kontak::whereMonth('created_at', now()->month)->count();

        return view('admin.dashboard', compact(
            'stats',
            'berita_terbaru',
            'kontak_terbaru',
            'berita_bulanan',
            'kontak_bulanan'
        ));
    }
}
