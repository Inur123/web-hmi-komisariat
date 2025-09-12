<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Penulis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('penulis', 'public');
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
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'deskripsi' => 'nullable|string',
    ]);

    if ($request->hasFile('foto')) {
        if ($penuli->foto) {
            Storage::disk('public')->delete($penuli->foto);
        }
        $data['foto'] = $request->file('foto')->store('penulis', 'public');
    }

    $penuli->update($data);

    return redirect()->route('penulis.index')->with('success', 'Penulis berhasil diperbarui.');
}

public function destroy(Penulis $penuli)
{
    if ($penuli->foto) {
        Storage::disk('public')->delete($penuli->foto);
    }
    $penuli->delete();

    return redirect()->route('penulis.index')->with('success', 'Penulis berhasil dihapus.');
}
}
