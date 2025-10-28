<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriFasilitas;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriFasilitasController extends Controller
{
    public function index()
    {
        $galeri = GaleriFasilitas::with('fasilitas')->orderBy('urutan')->get();
        return view('admin.galeri-fasilitas.index', compact('galeri'));
    }

    public function create()
    {
        $fasilitas = Fasilitas::where('status', 'active')->orderBy('nama')->get();
        return view('admin.galeri-fasilitas.create', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        // Auto generate urutan
        $data['urutan'] = GaleriFasilitas::count() + 1;

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            try {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();

                // Pastikan directory ada
                $directory = storage_path('app/public/images/galeri-fasilitas');
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

        GaleriFasilitas::create($data);

        return redirect()->route('admin.galeri-fasilitas.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function show(GaleriFasilitas $galeriFasilitas)
    {
        return view('admin.galeri-fasilitas.show', compact('galeriFasilitas'));
    }

    public function edit(GaleriFasilitas $galeriFasilitas)
    {
        $fasilitas = Fasilitas::where('status', 'active')->orderBy('nama')->get();
        return view('admin.galeri-fasilitas.edit', compact('galeriFasilitas', 'fasilitas'));
    }

    public function update(Request $request, GaleriFasilitas $galeriFasilitas)
    {
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            try {
                // Delete old gambar
                if ($galeriFasilitas->gambar) {
                    $oldPath = storage_path('app/public/images/galeri-fasilitas/' . $galeriFasilitas->gambar);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();

                // Pastikan directory ada
                $directory = storage_path('app/public/images/galeri-fasilitas');
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

        $galeriFasilitas->update($data);

        return redirect()->route('admin.galeri-fasilitas.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy(GaleriFasilitas $galeriFasilitas)
    {
        // Delete gambar
        if ($galeriFasilitas->gambar) {
            $oldPath = storage_path('app/public/images/galeri-fasilitas/' . $galeriFasilitas->gambar);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $galeriFasilitas->delete();

        return redirect()->route('admin.galeri-fasilitas.index')->with('success', 'Gambar berhasil dihapus.');
    }

    public function toggleStatus(GaleriFasilitas $galeriFasilitas)
    {
        $galeriFasilitas->update([
            'status' => $galeriFasilitas->status === 'active' ? 'inactive' : 'active'
        ]);

        return redirect()->back()->with('success', 'Status gambar berhasil diubah.');
    }
}
