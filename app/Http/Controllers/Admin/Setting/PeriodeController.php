<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index()
    {
        $periodes = Periode::latest()->paginate(10);
        return view('admin.setting.periode.index', compact('periodes'));
    }

    public function create()
    {
        return view('admin.setting.periode.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_periode' => 'required|string|unique:periodes,nama_periode',
        ]);

        Periode::create($request->all());
        return redirect()->route('periode.index')->with('success', 'Periode berhasil ditambahkan.');
    }

    public function edit(Periode $periode)
    {
        return view('admin.setting.periode.edit', compact('periode'));
    }

    public function update(Request $request, Periode $periode)
    {
        $request->validate([
            'nama_periode' => 'required|string|unique:periodes,nama_periode,' . $periode->id,
        ]);

        $periode->update($request->all());
        return redirect()->route('periode.index')->with('success', 'Periode berhasil diupdate.');
    }

    public function destroy(Periode $periode)
    {
        $periode->delete();
        return redirect()->route('periode.index')->with('success', 'Periode berhasil dihapus.');
    }
}
