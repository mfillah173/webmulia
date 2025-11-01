<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        // Tabel kontak sudah dihapus karena sudah ada setting
        // Form tetap menerima input tapi tidak disimpan ke database
        return redirect()->route('kontak')->with('success', 'Terima kasih atas pesan Anda!');
    }
}
