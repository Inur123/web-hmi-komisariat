<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// Intervention Image v3
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * ✅ Convert upload image menjadi .webp dan simpan ke storage/public
     * Return: path relatif (contoh: Gallery/thumbnail/xxxx.webp)
     */
    private function convertToWebp($file, string $folder, int $quality = 80): string
    {
        $filename = Str::uuid()->toString() . '.webp';
        $path = trim($folder, '/') . '/' . $filename;

        $manager = new ImageManager(new Driver());
        $image = $manager->read($file->getRealPath());
        $webp = $image->encode(new WebpEncoder(quality: $quality));

        Storage::disk('public')->put($path, (string) $webp);

        return $path;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'thumbnail' => 'required|image|max:5120',
            'galleries.*' => 'nullable|image|max:5120',
        ]);

        $gallery = Gallery::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
        ]);

        // ✅ Thumbnail -> WEBP
        if ($request->hasFile('thumbnail')) {
            $gallery->thumbnail = $this->convertToWebp($request->file('thumbnail'), 'Gallery/thumbnail', 80);
            $gallery->save();
        }

        // ✅ Images -> WEBP
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $file) {
                $path = $this->convertToWebp($file, 'Gallery/images', 80);
                $gallery->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil ditambahkan');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'thumbnail' => 'nullable|image|max:5120',
            'galleries.*' => 'nullable|image|max:5120',
            'deleted_images' => 'nullable|string', // format: "1,2,3"
        ]);

        $gallery->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
        ]);

        // ✅ Update thumbnail -> WEBP
        if ($request->hasFile('thumbnail')) {
            if ($gallery->thumbnail && Storage::disk('public')->exists($gallery->thumbnail)) {
                Storage::disk('public')->delete($gallery->thumbnail);
            }
            $gallery->thumbnail = $this->convertToWebp($request->file('thumbnail'), 'Gallery/thumbnail', 80);
            $gallery->save();
        }

        // ✅ Hapus gambar lama yang ditandai
        if ($request->filled('deleted_images')) {
            $deletedIds = array_filter(explode(',', $request->deleted_images));
            foreach ($deletedIds as $imgId) {
                $img = $gallery->images()->find($imgId);
                if ($img) {
                    if ($img->image && Storage::disk('public')->exists($img->image)) {
                        Storage::disk('public')->delete($img->image);
                    }
                    $img->delete();
                }
            }
        }

        // ✅ Tambah gambar baru -> WEBP
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $file) {
                $path = $this->convertToWebp($file, 'Gallery/images', 80);
                $gallery->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil diperbarui');
    }

    public function destroy(Gallery $gallery)
    {
        foreach ($gallery->images as $img) {
            if ($img->image && Storage::disk('public')->exists($img->image)) {
                Storage::disk('public')->delete($img->image);
            }
            $img->delete();
        }

        if ($gallery->thumbnail && Storage::disk('public')->exists($gallery->thumbnail)) {
            Storage::disk('public')->delete($gallery->thumbnail);
        }

        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil dihapus');
    }

    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', compact('gallery'));
    }
}
