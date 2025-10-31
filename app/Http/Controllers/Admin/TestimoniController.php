<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.testimoni.index', compact('testimoni'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_narasumber' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        // Handle gambar upload (cropped or original)
        if ($request->filled('gambar_cropped')) {
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

                $gambarName = time() . '_' . Str::slug($request->nama_narasumber) . '.' . $type;
                $directory = storage_path('app/public/images/testimoni');

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
                $directory = storage_path('app/public/images/testimoni');

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

        Testimoni::create($data);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function show(Testimoni $testimoni)
    {
        return view('admin.testimoni.show', compact('testimoni'));
    }

    public function edit(Testimoni $testimoni)
    {
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            'nama_narasumber' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        // Handle gambar upload (cropped or original)
        if ($request->filled('gambar_cropped')) {
            // Handle cropped image (base64)
            try {
                // Delete old image
                if ($testimoni->gambar) {
                    $oldImagePath = storage_path('app/public/images/testimoni/' . $testimoni->gambar);
                    if (file_exists($oldImagePath)) {
                        @unlink($oldImagePath);
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

                $gambarName = time() . '_' . Str::slug($request->nama_narasumber) . '.' . $type;
                $directory = storage_path('app/public/images/testimoni');

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
                // Delete old image
                if ($testimoni->gambar) {
                    $oldImagePath = storage_path('app/public/images/testimoni/' . $testimoni->gambar);
                    if (file_exists($oldImagePath)) {
                        @unlink($oldImagePath);
                    }
                }

                // Upload new image
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();
                $directory = storage_path('app/public/images/testimoni');

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

        $testimoni->update($data);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimoni $testimoni)
    {
        // Delete image
        if ($testimoni->gambar) {
            $imagePath = storage_path('app/public/images/testimoni/' . $testimoni->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
