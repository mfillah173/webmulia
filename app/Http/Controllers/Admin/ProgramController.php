<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.program.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tujuan_program' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $data = $request->all();
        unset($data['slug']);

        // Handle gambar dari media library (semua gambar disimpan di images/media)
        if ($request->filled('gambar_from_library')) {
            $libraryPath = $request->input('gambar_from_library');
            // Extract filename from URL
            if (preg_match('/\/images\/media\/(.+)$/', $libraryPath, $matches)) {
                $fileName = $matches[1];
                $data['gambar'] = $fileName;
            }
        } elseif ($request->filled('gambar_cropped')) {
            // Handle cropped image (base64)
            try {
                $base64Image = $request->input('gambar_cropped');
                // Remove data:image/png;base64, or data:image/jpeg;base64, prefix
                if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
                    $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
                    $type = strtolower($type[1]); // jpg, png, gif
                } else {
                    $type = 'jpg';
                }

                $imageData = base64_decode($base64Image);
                if ($imageData === false) {
                    throw new \Exception('Invalid base64 image data');
                }

                $gambarName = time() . '_' . Str::slug($request->nama) . '.' . $type;
                $directory = storage_path('app/public/images/media');

                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                file_put_contents($directory . '/' . $gambarName, $imageData);
                $data['gambar'] = $gambarName;
            } catch (\Exception $e) {
                Log::error('Cropped image upload failed:', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Gagal menyimpan gambar yang di-crop: ' . $e->getMessage())->withInput();
            }
        } elseif ($request->hasFile('gambar')) {
            // Handle original file upload
            try {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();
                $directory = storage_path('app/public/images/media');

                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                $gambar->move($directory, $gambarName);
                $data['gambar'] = $gambarName;
            } catch (\Exception $e) {
                Log::error('File upload failed:', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Gagal mengupload gambar: ' . $e->getMessage())->withInput();
            }
        }

        $program = Program::create($data);

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil ditambahkan.');
    }

    public function show(Program $program)
    {
        return view('admin.program.show', compact('program'));
    }

    public function edit(Program $program)
    {
        return view('admin.program.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tujuan_program' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $data = $request->all();
        unset($data['slug']);

        // Handle gambar dari media library (semua gambar disimpan di images/media)
        if ($request->filled('gambar_from_library')) {
            $libraryPath = $request->input('gambar_from_library');
            // Extract filename from URL
            if (preg_match('/\/images\/media\/(.+)$/', $libraryPath, $matches)) {
                $fileName = $matches[1];

                // Delete old gambar only if it's different from the new one
                if ($program->gambar && $program->gambar !== $fileName) {
                    $oldPath = storage_path('app/public/images/media/' . $program->gambar);
                    if (file_exists($oldPath)) {
                        @unlink($oldPath);
                    }
                }

                $data['gambar'] = $fileName;
            }
        } elseif ($request->filled('gambar_cropped')) {
            // Handle cropped image (base64)
            try {
                // Delete old gambar
                if ($program->gambar) {
                    $oldPath = storage_path('app/public/images/media/' . $program->gambar);
                    if (file_exists($oldPath)) {
                        @unlink($oldPath);
                    }
                }

                $base64Image = $request->input('gambar_cropped');
                // Remove data:image/png;base64, or data:image/jpeg;base64, prefix
                if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
                    $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
                    $type = strtolower($type[1]); // jpg, png, gif
                } else {
                    $type = 'jpg';
                }

                $imageData = base64_decode($base64Image);
                if ($imageData === false) {
                    throw new \Exception('Invalid base64 image data');
                }

                $gambarName = time() . '_' . Str::slug($request->nama) . '.' . $type;
                $directory = storage_path('app/public/images/media');

                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                file_put_contents($directory . '/' . $gambarName, $imageData);
                $data['gambar'] = $gambarName;
            } catch (\Exception $e) {
                Log::error('Cropped image update failed:', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Gagal menyimpan gambar yang di-crop: ' . $e->getMessage())->withInput();
            }
        } elseif ($request->hasFile('gambar')) {
            // Handle original file upload
            try {
                // Delete old gambar
                if ($program->gambar) {
                    $oldPath = storage_path('app/public/images/media/' . $program->gambar);
                    if (file_exists($oldPath)) {
                        @unlink($oldPath);
                    }
                }

                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();
                $directory = storage_path('app/public/images/media');

                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                $gambar->move($directory, $gambarName);
                $data['gambar'] = $gambarName;
            } catch (\Exception $e) {
                Log::error('File update failed:', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Gagal mengupdate gambar: ' . $e->getMessage())->withInput();
            }
        }

        $program->update($data);

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        // Delete gambar
        if ($program->gambar) {
            $oldPath = storage_path('app/public/images/media/' . $program->gambar);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $program->delete();

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil dihapus.');
    }
}
