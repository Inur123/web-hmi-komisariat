<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Penulis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// Intervention Image v3
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::latest()->paginate(10);
        return view('admin.posts.penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('admin.posts.penulis.create');
    }

    /**
     * ✅ Convert upload image menjadi .webp dan simpan ke storage/public
     * Return: path relatif (contoh: penulis/xxxx.webp)
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
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048', // ✅ jangan batasi mimes, karena output selalu webp
            'deskripsi' => 'nullable|string',
        ]);

        // ✅ Foto -> WEBP
        if ($request->hasFile('foto')) {
            $data['foto'] = $this->convertToWebp($request->file('foto'), 'penulis', 80);
        }

        Penulis::create($data);

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function show(Penulis $penuli)
    {
        return view('admin.posts.penulis.show', ['penulis' => $penuli]);
    }

    public function edit(Penulis $penuli)
    {
        return view('admin.posts.penulis.edit', ['penulis' => $penuli]);
    }

    public function update(Request $request, Penulis $penuli)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        // ✅ Jika upload foto baru -> hapus lama -> simpan webp baru
        if ($request->hasFile('foto')) {
            if ($penuli->foto && Storage::disk('public')->exists($penuli->foto)) {
                Storage::disk('public')->delete($penuli->foto);
            }
            $data['foto'] = $this->convertToWebp($request->file('foto'), 'penulis', 80);
        }

        $penuli->update($data);

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil diperbarui.');
    }

    public function destroy(Penulis $penuli)
    {
        if ($penuli->foto && Storage::disk('public')->exists($penuli->foto)) {
            Storage::disk('public')->delete($penuli->foto);
        }

        $penuli->delete();

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil dihapus.');
    }
}
