<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'galleries.*' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $gallery = Gallery::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
        ]);

        if ($request->hasFile('thumbnail')) {
            $gallery->thumbnail = $request->file('thumbnail')->store('Gallery/thumbnail', 'public');
            $gallery->save();
        }

        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $file) {
                $gallery->images()->create(['image' => $file->store('Gallery/images', 'public')]);
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
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'galleries.*' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'deleted_images' => 'nullable|string',
        ]);

        $gallery->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
        ]);

        // Update thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($gallery->thumbnail) {
                Storage::disk('public')->delete($gallery->thumbnail);
            }
            $gallery->thumbnail = $request->file('thumbnail')->store('Gallery/thumbnail', 'public');
            $gallery->save();
        }

        // Hapus gambar lama yang ditandai
        if ($request->filled('deleted_images')) {
            $deletedIds = explode(',', $request->deleted_images);
            foreach ($deletedIds as $imgId) {
                $img = $gallery->images()->find($imgId);
                if ($img) {
                    Storage::disk('public')->delete($img->image);
                    $img->delete();
                }
            }
        }

        // Tambah gambar baru
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $file) {
                $gallery->images()->create(['image' => $file->store('Gallery/images', 'public')]);
            }
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil diperbarui');
    }

    public function destroy(Gallery $gallery)
    {
        foreach ($gallery->images as $img) {
            Storage::disk('public')->delete($img->image);
            $img->delete();
        }

        if ($gallery->thumbnail) {
            Storage::disk('public')->delete($gallery->thumbnail);
        }

        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil dihapus');
    }
    public function show(Gallery $gallery)
    {
        // Kirim gallery ke view show
        return view('admin.galleries.show', compact('gallery'));
    }
}
