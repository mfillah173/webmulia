<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriProgram;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriProgramController extends Controller
{
    public function index()
    {
        $galeri = GaleriProgram::with('program')->orderBy('urutan')->get();
        return view('admin.galeri-program.index', compact('galeri'));
    }

    public function create()
    {
        $programs = Program::where('status', 'active')->orderBy('nama')->get();
        return view('admin.galeri-program.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        // Auto generate urutan
        $data['urutan'] = GaleriProgram::count() + 1;

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            try {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();

                // Pastikan directory ada
                $directory = storage_path('app/public/images/galeri-program');
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

        GaleriProgram::create($data);

        return redirect()->route('admin.galeri-program.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function show(GaleriProgram $galeriProgram)
    {
        return view('admin.galeri-program.show', compact('galeriProgram'));
    }

    public function edit(GaleriProgram $galeriProgram)
    {
        $programs = Program::where('status', 'active')->orderBy('nama')->get();
        return view('admin.galeri-program.edit', compact('galeriProgram', 'programs'));
    }

    public function update(Request $request, GaleriProgram $galeriProgram)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            try {
                // Delete old gambar
                if ($galeriProgram->gambar) {
                    $oldPath = storage_path('app/public/images/galeri-program/' . $galeriProgram->gambar);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();

                // Pastikan directory ada
                $directory = storage_path('app/public/images/galeri-program');
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

        $galeriProgram->update($data);

        return redirect()->route('admin.galeri-program.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy(GaleriProgram $galeriProgram)
    {
        // Delete gambar
        if ($galeriProgram->gambar) {
            $oldPath = storage_path('app/public/images/galeri-program/' . $galeriProgram->gambar);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $galeriProgram->delete();

        return redirect()->route('admin.galeri-program.index')->with('success', 'Gambar berhasil dihapus.');
    }

    public function toggleStatus(GaleriProgram $galeriProgram)
    {
        $galeriProgram->update([
            'status' => $galeriProgram->status === 'active' ? 'inactive' : 'active'
        ]);

        return redirect()->back()->with('success', 'Status gambar berhasil diubah.');
    }
}
