<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::orderBy('created_at', 'desc')->paginate(10);
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $data = $request->all();
        unset($data['slug']); // Kolom slug sudah dihapus

        // Handle gambar dari media library (semua gambar disimpan di images/media)
        if ($request->filled('gambar_from_library')) {
            $libraryPath = $request->input('gambar_from_library');
            // Extract filename from URL (e.g., http://domain.com/storage/images/media/image.jpg)
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

        Fasilitas::create($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function show($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.show', compact('fasilitas'));
    }

    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Find fasilitas by ID
            $fasilitas = Fasilitas::findOrFail($id);

            $request->validate([
                'nama' => 'required|string|max:255',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif'
            ]);

            $data = $request->all();
            unset($data['slug']); // Kolom slug sudah dihapus

            // Handle gambar dari media library (semua gambar disimpan di images/media)
            if ($request->filled('gambar_from_library')) {
                $libraryPath = $request->input('gambar_from_library');
                // Extract filename from URL
                if (preg_match('/\/images\/media\/(.+)$/', $libraryPath, $matches)) {
                    $fileName = $matches[1];

                    // Delete old gambar only if it's different from the new one
                    if ($fasilitas->gambar && $fasilitas->gambar !== $fileName) {
                        $oldPath = storage_path('app/public/images/media/' . $fasilitas->gambar);
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
                    if ($fasilitas->gambar) {
                        $oldPath = storage_path('app/public/images/media/' . $fasilitas->gambar);
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
                    if ($fasilitas->gambar) {
                        $oldPath = storage_path('app/public/images/media/' . $fasilitas->gambar);
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

            $fasilitas->update($data);

            return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::warning('Fasilitas not found for update:', ['id' => $id, 'error' => $e->getMessage()]);
            return redirect()->route('admin.fasilitas.index')->with('error', 'Fasilitas tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Fasilitas update failed:', [
                'error' => $e->getMessage(),
                'fasilitas_id' => $id,
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Gagal memperbarui fasilitas: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            // Find fasilitas by ID
            $fasilitas = Fasilitas::findOrFail($id);

            Log::info('Fasilitas destroy method called:', [
                'fasilitas_id' => $fasilitas->id,
                'nama' => $fasilitas->nama,
                'request_method' => request()->method(),
                'route' => request()->route()->getName()
            ]);

            // Store nama for success message before delete
            $nama = $fasilitas->nama;
            $fasilitasId = $fasilitas->id;

            // Delete gambar if exists
            if ($fasilitas->gambar) {
                $oldPath = storage_path('app/public/images/media/' . $fasilitas->gambar);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            // Use DB query directly to ensure deletion
            $deleted = DB::table('fasilitas')->where('id', $fasilitasId)->delete();

            if ($deleted) {
                Log::info('Fasilitas deleted successfully using DB query:', [
                    'fasilitas_id' => $fasilitasId,
                    'nama' => $nama,
                    'rows_deleted' => $deleted
                ]);

                // Double check deletion
                $verify = DB::table('fasilitas')->where('id', $fasilitasId)->first();
                if (!$verify) {
                    return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas "' . $nama . '" berhasil dihapus.');
                } else {
                    Log::error('Fasilitas still exists after DB delete:', ['fasilitas_id' => $fasilitasId]);
                    return redirect()->route('admin.fasilitas.index')->with('error', 'Gagal menghapus fasilitas. Silakan hubungi administrator.');
                }
            } else {
                Log::error('DB delete returned 0 rows:', ['fasilitas_id' => $fasilitasId]);
                return redirect()->route('admin.fasilitas.index')->with('error', 'Gagal menghapus fasilitas. Data tidak ditemukan.');
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::warning('Fasilitas not found for delete:', ['id' => $id, 'error' => $e->getMessage()]);
            return redirect()->route('admin.fasilitas.index')->with('error', 'Fasilitas tidak ditemukan.');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Fasilitas delete query failed:', [
                'error' => $e->getMessage(),
                'fasilitas_id' => $id,
                'sql' => $e->getSql(),
                'bindings' => $e->getBindings()
            ]);
            return redirect()->route('admin.fasilitas.index')->with('error', 'Gagal menghapus fasilitas. Mungkin masih ada data terkait.');
        } catch (\Exception $e) {
            Log::error('Fasilitas delete failed:', [
                'error' => $e->getMessage(),
                'fasilitas_id' => $id,
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('admin.fasilitas.index')->with('error', 'Gagal menghapus fasilitas: ' . $e->getMessage());
        }
    }
}
