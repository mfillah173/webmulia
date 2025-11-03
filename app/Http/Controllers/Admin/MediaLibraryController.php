<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class MediaLibraryController extends Controller
{
    public function index(Request $request)
    {
        $images = $this->getImages($request);

        // Paginate
        $perPage = 24;
        $currentPage = $request->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $paginatedImages = array_slice($images, $offset, $perPage);

        $totalPages = ceil(count($images) / $perPage);

        return view('admin.media-library.index', compact('paginatedImages', 'totalPages', 'currentPage', 'images'));
    }

    public function grid(Request $request)
    {
        $images = $this->getImages($request);

        // Paginate
        $perPage = 24;
        $currentPage = $request->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $paginatedImages = array_slice($images, $offset, $perPage);

        $totalPages = ceil(count($images) / $perPage);

        return view('admin.media-library.grid', compact('paginatedImages', 'totalPages', 'currentPage'));
    }

    private function getImages(Request $request)
    {
        // Mengambil gambar dari direktori media saja (semua gambar disimpan di images/media)
        $mediaDirectory = storage_path('app/public/images/media');
        $images = [];

        if (File::exists($mediaDirectory)) {
            $files = File::files($mediaDirectory);

            foreach ($files as $file) {
                $extension = strtolower($file->getExtension());
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $fileName = $file->getFilename();
                    $fileSize = $file->getSize();
                    $fileModified = $file->getMTime();

                    $images[] = [
                        'name' => $fileName,
                        'path' => asset('storage/images/media/' . $fileName),
                        'storage_path' => 'images/media/' . $fileName,
                        'size' => $fileSize,
                        'size_formatted' => $this->formatBytes($fileSize),
                        'modified' => $fileModified,
                        'modified_formatted' => date('d/m/Y H:i', $fileModified),
                        'extension' => $extension,
                    ];
                }
            }
        }

        // Sort by modified date (newest first)
        usort($images, function ($a, $b) {
            return $b['modified'] - $a['modified'];
        });

        return $images;
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'gambar_cropped' => 'nullable|string',
        ]);

        try {
            // Simpan ke direktori media (umum)
            $mediaDirectory = storage_path('app/public/images/media');
            if (!file_exists($mediaDirectory)) {
                mkdir($mediaDirectory, 0755, true);
            }

            // Handle cropped image (prioritas)
            if ($request->filled('gambar_cropped')) {
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

                $fileName = time() . '_media.' . $type;
                file_put_contents($mediaDirectory . '/' . $fileName, $imageData);
            } elseif ($request->hasFile('gambar')) {
                // Handle original file upload
                $file = $request->file('gambar');
                $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
                $file->move($mediaDirectory, $fileName);
            } else {
                return redirect()->back()->with('error', 'Silakan pilih gambar atau crop gambar terlebih dahulu!');
            }

            return redirect()->route('admin.media-library.index')->with('success', 'Gambar berhasil diupload!');
        } catch (\Exception $e) {
            Log::error('Media library upload failed:', ['error' => $e->getMessage()]);
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        $request->validate([
            'path' => 'required|string',
        ]);

        $storagePath = $request->input('path');
        $fullPath = storage_path('app/public/' . $storagePath);

        if (File::exists($fullPath)) {
            try {
                File::delete($fullPath);
                return response()->json([
                    'success' => true,
                    'message' => 'Gambar berhasil dihapus'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus gambar: ' . $e->getMessage()
                ], 500);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'File tidak ditemukan'
        ], 404);
    }

    private function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = ['B', 'KB', 'MB', 'GB', 'TB'];
        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }
}
