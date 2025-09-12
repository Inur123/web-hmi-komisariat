<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::latest()->paginate(10);
        return view('admin.alumni.index', compact('alumnis'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
            'nohp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'fakultas' => 'nullable|string|max:255',
            'prodi' => 'nullable|string|max:255',
            'periode' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        Alumni::create($data);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil ditambahkan.');
    }

    // EDIT: gunakan parameter $alumnus (singular) sesuai binding route default
    public function edit(Alumni $alumnus)
    {
        // kirimkan variabel $alumnus ke view
        return view('admin.alumni.edit', compact('alumnus'));
    }

    // UPDATE: terima Alumni $alumnus
    public function update(Request $request, Alumni $alumnus)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
            'nohp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'fakultas' => 'nullable|string|max:255',
            'prodi' => 'nullable|string|max:255',
            'periode' => 'nullable|string|max:255',
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

    // DESTROY: terima Alumni $alumnus
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
