<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriSistem;
use App\Models\Sistem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriSistemController extends Controller
{
    public function index()
    {
        $galeri = GaleriSistem::with('sistem')->orderBy('urutan')->get();
        return view('admin.galeri-sistem.index', compact('galeri'));
    }

    public function create()
    {
        $sistems = Sistem::where('status', 'active')->orderBy('nama')->get();
        return view('admin.galeri-sistem.create', compact('sistems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sistem_id' => 'required|exists:sistems,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        // Auto generate urutan
        $data['urutan'] = GaleriSistem::count() + 1;

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            try {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();

                // Pastikan directory ada
                $directory = storage_path('app/public/images/galeri-sistem');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                // Upload file
                $gambar->move($directory, $gambarName);

                $data['gambar'] = $gambarName;
            } catch (\Exception $e) {
                \Log::error('File upload failed:', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Gagal mengupload gambar: ' . $e->getMessage());
            }
        }

        GaleriSistem::create($data);

        return redirect()->route('admin.galeri-sistem.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function show(GaleriSistem $galeriSistem)
    {
        return view('admin.galeri-sistem.show', compact('galeriSistem'));
    }

    public function edit(GaleriSistem $galeriSistem)
    {
        $sistems = Sistem::where('status', 'active')->orderBy('nama')->get();
        return view('admin.galeri-sistem.edit', compact('galeriSistem', 'sistems'));
    }

    public function update(Request $request, GaleriSistem $galeriSistem)
    {
        $request->validate([
            'sistem_id' => 'required|exists:sistems,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            try {
                // Delete old gambar
                if ($galeriSistem->gambar) {
                    $oldPath = storage_path('app/public/images/galeri-sistem/' . $galeriSistem->gambar);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();

                // Pastikan directory ada
                $directory = storage_path('app/public/images/galeri-sistem');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                // Upload file
                $gambar->move($directory, $gambarName);

                $data['gambar'] = $gambarName;
            } catch (\Exception $e) {
                \Log::error('File update failed:', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Gagal mengupdate gambar: ' . $e->getMessage());
            }
        }

        $galeriSistem->update($data);

        return redirect()->route('admin.galeri-sistem.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy(GaleriSistem $galeriSistem)
    {
        // Delete gambar
        if ($galeriSistem->gambar) {
            $oldPath = storage_path('app/public/images/galeri-sistem/' . $galeriSistem->gambar);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $galeriSistem->delete();

        return redirect()->route('admin.galeri-sistem.index')->with('success', 'Gambar berhasil dihapus.');
    }

    public function toggleStatus(GaleriSistem $galeriSistem)
    {
        $galeriSistem->update([
            'status' => $galeriSistem->status === 'active' ? 'inactive' : 'active'
        ]);

        return redirect()->back()->with('success', 'Status gambar berhasil diubah.');
    }
}
