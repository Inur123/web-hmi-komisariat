<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// Intervention Image v3
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::latest()->paginate(10);
        return view('admin.alumni.index', compact('alumnis'));
    }

    public function ketuaUmum()
    {
        $ketuaUmum = Alumni::where('jabatan', 'Ketua Umum')->latest()->paginate(10);
        return view('admin.alumni.ketua-umum', compact('ketuaUmum'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    /**
     * ✅ Convert upload image menjadi .webp dan simpan ke storage/public
     * Return: path relatif (contoh: alumni/xxxx.webp)
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
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat'        => 'nullable|string',
            'nohp'          => 'nullable|string|max:20',
            'foto'          => 'nullable|image|max:2048', // ✅ tidak perlu mimes jpg/png karena dikonversi ke webp
            'fakultas'      => 'nullable|string|max:255',
            'prodi'         => 'nullable|string|max:255',
            'periode'       => 'nullable|string|max:255',
            'jabatan'       => 'required|in:Alumni,Ketua Umum',
        ]);

        $data = $request->all();

        // ✅ Foto -> WEBP
        if ($request->hasFile('foto')) {
            $data['foto'] = $this->convertToWebp($request->file('foto'), 'alumni', 80);
        }

        Alumni::create($data);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil ditambahkan.');
    }

    public function edit(Alumni $alumnus)
    {
        return view('admin.alumni.edit', compact('alumnus'));
    }

    public function update(Request $request, Alumni $alumnus)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat'        => 'nullable|string',
            'nohp'          => 'nullable|string|max:20',
            'foto'          => 'nullable|image|max:2048',
            'fakultas'      => 'nullable|string|max:255',
            'prodi'         => 'nullable|string|max:255',
            'periode'       => 'nullable|string|max:255',
            'jabatan'       => 'required|in:Alumni,Ketua Umum',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($alumnus->foto && Storage::disk('public')->exists($alumnus->foto)) {
                Storage::disk('public')->delete($alumnus->foto);
            }

            // ✅ simpan webp baru
            $data['foto'] = $this->convertToWebp($request->file('foto'), 'alumni', 80);
        }

        $alumnus->update($data);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui.');
    }

    public function destroy(Alumni $alumnus)
    {
        if ($alumnus->foto && Storage::disk('public')->exists($alumnus->foto)) {
            Storage::disk('public')->delete($alumnus->foto);
        }

        $alumnus->delete();

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil dihapus.');
    }

    public function show(Alumni $alumnus)
    {
        return view('admin.alumni.show', compact('alumnus'));
    }
}
