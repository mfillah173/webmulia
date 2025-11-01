<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Setting;

class KontakController extends Controller
{
    public function index()
    {
        $setting = Setting::getSetting();
        return view('kontak', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|max:1000'
        ]);

        // Simpan ke database
        Kontak::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
            'tanggal_kirim' => now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);
        
        return redirect()->route('kontak')->with('success', 'Pesan Anda telah berhasil dikirim. Terima kasih!');
    }
}
