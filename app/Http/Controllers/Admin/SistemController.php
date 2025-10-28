<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sistem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SistemController extends Controller
{
    public function index()
    {
        $sistems = Sistem::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.sistem.index', compact('sistems'));
    }

    public function create()
    {
        return view('admin.sistem.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fitur' => 'required|string',
            'keunggulan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        // Auto generate urutan (berdasarkan jumlah data + 1)
        $data['urutan'] = Sistem::count() + 1;

        // Handle gambar upload dengan cara yang lebih robust
        if ($request->hasFile('gambar')) {
            try {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();

                // Pastikan directory ada
                $directory = storage_path('app/public/images/sistem');
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

        Sistem::create($data);

        return redirect()->route('admin.sistem.index')->with('success', 'Sistem berhasil ditambahkan.');
    }

    public function show(Sistem $sistem)
    {
        return view('admin.sistem.show', compact('sistem'));
    }

    public function edit(Sistem $sistem)
    {
        return view('admin.sistem.edit', compact('sistem'));
    }

    public function update(Request $request, Sistem $sistem)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fitur' => 'required|string',
            'keunggulan' => 'required|string',
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
                if ($sistem->gambar) {
                    $oldPath = storage_path('app/public/images/sistem/' . $sistem->gambar);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();

                // Pastikan directory ada
                $directory = storage_path('app/public/images/sistem');
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

        $sistem->update($data);

        return redirect()->route('admin.sistem.index')->with('success', 'Sistem berhasil diperbarui.');
    }

    public function destroy(Sistem $sistem)
    {
        // Delete gambar
        if ($sistem->gambar) {
            $oldPath = storage_path('app/public/images/sistem/' . $sistem->gambar);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $sistem->delete();

        return redirect()->route('admin.sistem.index')->with('success', 'Sistem berhasil dihapus.');
    }

    public function toggleStatus(Sistem $sistem)
    {
        $sistem->update([
            'status' => $sistem->status === 'active' ? 'inactive' : 'active'
        ]);

        return redirect()->back()->with('success', 'Status sistem berhasil diubah.');
    }
}
