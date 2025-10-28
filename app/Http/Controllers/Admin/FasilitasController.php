<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fitur' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        // Auto generate urutan (berdasarkan jumlah data + 1)
        $data['urutan'] = Fasilitas::count() + 1;

        // Handle gambar upload dengan cara yang lebih robust
        if ($request->hasFile('gambar')) {
            try {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();

                // Pastikan directory ada
                $directory = storage_path('app/public/images/fasilitas');
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

        // Handle meta keywords
        if ($request->meta_keywords) {
            $data['meta_keywords'] = array_map('trim', explode(',', $request->meta_keywords));
        }

        Fasilitas::create($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function show(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.show', compact('fasilitas'));
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fitur' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        // Urutan tidak diubah saat update (tetap menggunakan urutan yang sudah ada)

        // Handle gambar upload dengan cara yang lebih robust
        if ($request->hasFile('gambar')) {
            try {
                // Delete old gambar
                if ($fasilitas->gambar) {
                    $oldPath = storage_path('app/public/images/fasilitas/' . $fasilitas->gambar);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();

                // Pastikan directory ada
                $directory = storage_path('app/public/images/fasilitas');
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

        // Handle meta keywords
        if ($request->meta_keywords) {
            $data['meta_keywords'] = array_map('trim', explode(',', $request->meta_keywords));
        }

        $fasilitas->update($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Fasilitas $fasilitas)
    {
        // Delete gambar
        if ($fasilitas->gambar) {
            $oldPath = storage_path('app/public/images/fasilitas/' . $fasilitas->gambar);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $fasilitas->delete();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus.');
    }

    public function toggleStatus(Fasilitas $fasilitas)
    {
        $fasilitas->update([
            'status' => $fasilitas->status === 'active' ? 'inactive' : 'active'
        ]);

        return redirect()->back()->with('success', 'Status fasilitas berhasil diubah.');
    }
}
