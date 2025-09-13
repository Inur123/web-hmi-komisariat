<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kader;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaderController extends Controller
{
    // Daftar Kader dengan filter
    public function index(Request $request)
    {
        $query = Kader::with('periode')->latest();

        if ($request->filled('periode_id')) {
            $query->where('periode_id', $request->periode_id);
        }

        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        $kaders = $query->paginate(10)->withQueryString();
        $periodes = Periode::all();

        return view('admin.kader.index', compact('kaders', 'periodes'));
    }

    // Form tambah Kader
    public function create()
    {
        $periodes = Periode::all();
        $jabatanList = $this->getJabatanList();
        return view('admin.kader.create', compact('periodes', 'jabatanList'));
    }

    // Simpan data Kader
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'periode_id' => 'required|exists:periodes,id',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'nama','jenis_kelamin','nohp','alamat','fakultas','prodi','hobi','periode_id','jabatan'
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('kader', 'public');
        }

        Kader::create($data);

        return redirect()->route('kader.index')->with('success', 'Kader berhasil ditambahkan.');
    }

    // Form edit Kader
    public function edit(Kader $kader)
    {
        $periodes = Periode::all();
        $jabatanList = $this->getJabatanList();
        return view('admin.kader.edit', compact('kader', 'periodes', 'jabatanList'));
    }

    // Update data Kader
    public function update(Request $request, Kader $kader)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'periode_id' => 'required|exists:periodes,id',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'nama','jenis_kelamin','nohp','alamat','fakultas','prodi','hobi','periode_id','jabatan'
        ]);

        if ($request->hasFile('foto')) {
            if ($kader->foto) {
                Storage::disk('public')->delete($kader->foto);
            }
            $data['foto'] = $request->file('foto')->store('kader', 'public');
        }

        $kader->update($data);

        return redirect()->route('kader.index')->with('success', 'Kader berhasil diupdate.');
    }

    // Hapus Kader
    public function destroy(Kader $kader)
    {
        if ($kader->foto) {
            Storage::disk('public')->delete($kader->foto);
        }
        $kader->delete();

        return redirect()->route('kader.index')->with('success', 'Kader berhasil dihapus.');
    }

    // List jabatan
    private function getJabatanList()
    {
        return [
            'Ketua umum',
            'Sekretaris umum',
            'Wasekum bidang pppa',
            'Wasekum bidang ptkp',
            'Wasekum bidang kpp',
            'Wasekum bidang pp',
            'Bendahara umum',
            'Kabid pppa',
            'Kabid ptkp',
            'Kabid kpp',
            'Kabid pp',
            'Departemen bidang pppa',
            'Departemen bidang ptkp',
            'Departemen bidang kpp',
            'Departemen bidang pp',
        ];
    }
}
