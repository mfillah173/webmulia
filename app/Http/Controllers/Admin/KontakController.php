<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $setting = Setting::getSetting();

        return view('admin.kontak.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'alamat' => 'nullable|string|max:255',
            'kota' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'jam_operasional_senin_jumat' => 'nullable|string|max:255',
            'jam_operasional_sabtu' => 'nullable|string|max:255',
            'google_maps_embed' => 'nullable|string',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'admission_link' => 'nullable|url|max:500'
        ]);

        $setting = Setting::getSetting();
        $setting->update($request->all());

        return redirect()->route('admin.kontak.index')->with('success', 'Informasi kontak berhasil diperbarui.');
    }
}
