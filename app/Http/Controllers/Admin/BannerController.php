<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'nullable|boolean'
        ]);

        $data = $request->all();
        $data['aktif'] = $request->has('aktif') ? true : false;

        // Handle gambar dari media library
        if ($request->filled('gambar_from_library')) {
            $libraryPath = $request->input('gambar_from_library');
            if (preg_match('/\/images\/media\/(.+)$/', $libraryPath, $matches)) {
                $fileName = $matches[1];
                $data['gambar'] = $fileName;
            }
        } elseif ($request->filled('gambar_cropped')) {
            // Handle cropped image (base64)
            try {
                $base64Image = $request->input('gambar_cropped');
                if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
                    $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
                    $type = strtolower($type[1]);
                } else {
                    $type = 'jpg';
                }

                $imageData = base64_decode($base64Image);
                if ($imageData === false) {
                    throw new \Exception('Invalid base64 image data');
                }

                $gambarName = time() . '_banner_' . Str::random(10) . '.' . $type;
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
                $gambarName = time() . '_banner_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
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

        Banner::create($data);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan.');
    }

    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.show', compact('banner'));
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'nullable|boolean'
        ]);

        $banner = Banner::findOrFail($id);
        $data = $request->all();
        $data['aktif'] = $request->has('aktif') ? true : false;

        // Handle gambar dari media library
        if ($request->filled('gambar_from_library')) {
            $libraryPath = $request->input('gambar_from_library');
            if (preg_match('/\/images\/media\/(.+)$/', $libraryPath, $matches)) {
                $fileName = $matches[1];
                // Hapus gambar lama jika bukan dari library
                if ($banner->gambar && file_exists(storage_path('app/public/images/media/' . $banner->gambar))) {
                    @unlink(storage_path('app/public/images/media/' . $banner->gambar));
                }
                $data['gambar'] = $fileName;
            }
        } elseif ($request->filled('gambar_cropped')) {
            // Handle cropped image (base64)
            try {
                $base64Image = $request->input('gambar_cropped');
                if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
                    $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
                    $type = strtolower($type[1]);
                } else {
                    $type = 'jpg';
                }

                $imageData = base64_decode($base64Image);
                if ($imageData === false) {
                    throw new \Exception('Invalid base64 image data');
                }

                // Hapus gambar lama
                if ($banner->gambar && file_exists(storage_path('app/public/images/media/' . $banner->gambar))) {
                    @unlink(storage_path('app/public/images/media/' . $banner->gambar));
                }

                $gambarName = time() . '_banner_' . Str::random(10) . '.' . $type;
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
                // Hapus gambar lama
                if ($banner->gambar && file_exists(storage_path('app/public/images/media/' . $banner->gambar))) {
                    @unlink(storage_path('app/public/images/media/' . $banner->gambar));
                }

                $gambar = $request->file('gambar');
                $gambarName = time() . '_banner_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
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

        $banner->update($data);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Hapus gambar
        if ($banner->gambar && file_exists(storage_path('app/public/images/media/' . $banner->gambar))) {
            @unlink(storage_path('app/public/images/media/' . $banner->gambar));
        }

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus.');
    }
}
