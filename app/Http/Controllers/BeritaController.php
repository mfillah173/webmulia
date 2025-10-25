<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::where('status', 'active')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('berita', compact('berita'));
    }

    public function show($id)
    {
        $berita = Berita::where('status', 'active')
            ->findOrFail($id);

        return view('berita-detail', compact('berita'));
    }
}


