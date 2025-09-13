<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    /**
     * Tampilkan semua data alumni (jabatan Alumni & Ketua Umum)
     */
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

    /**
     * Form tambah alumni
     */
    public function create()
    {
        return view('admin.alumni.create');
    }

    /**
     * Simpan data alumni baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat'        => 'nullable|string',
            'nohp'          => 'nullable|string|max:20',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'fakultas'      => 'nullable|string|max:255',
            'prodi'         => 'nullable|string|max:255',
            'periode'       => 'nullable|string|max:255',
            'jabatan'       => 'required|in:Alumni,Ketua Umum',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        Alumni::create($data);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil ditambahkan.');
    }

    /**
     * Form edit data alumni
     */
    public function edit(Alumni $alumnus)
    {
        return view('admin.alumni.edit', compact('alumnus'));
    }

    /**
     * Update data alumni
     */
    public function update(Request $request, Alumni $alumnus)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat'        => 'nullable|string',
            'nohp'          => 'nullable|string|max:20',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            $data['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        $alumnus->update($data);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui.');
    }

    /**
     * Hapus data alumni
     */
    public function destroy(Alumni $alumnus)
    {
        if ($alumnus->foto && Storage::disk('public')->exists($alumnus->foto)) {
            Storage::disk('public')->delete($alumnus->foto);
        }

        $alumnus->delete();

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil dihapus.');
    }

    /**
     * Detail alumni
     */
    public function show(Alumni $alumnus)
    {
        return view('admin.alumni.show', compact('alumnus'));
    }
}
