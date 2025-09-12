@extends('admin.layouts.app')

@section('title', 'Detail Penulis')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white/80 rounded-3xl shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Penulis</h2>

    <div class="space-y-4">
        <div>
            <label class="block font-medium">Nama:</label>
            <p>{{ $penulis->nama }}</p>
        </div>
        <div>
            <label class="block font-medium">Jabatan:</label>
            <p>{{ $penulis->jabatan }}</p>
        </div>
        <div>
            <label class="block font-medium">Foto:</label>
            @if ($penulis->foto)
                <img src="{{ asset('storage/' . $penulis->foto) }}" alt="Foto" class="w-24 h-24 rounded">
            @else
                <p class="text-gray-500">Tidak ada foto</p>
            @endif
        </div>
        <div>
            <label class="block font-medium">Deskripsi:</label>
            <p>{{ $penulis->deskripsi }}</p>
        </div>
    </div>

    <div class="mt-6 flex justify-end space-x-2">
        <a href="{{ route('penulis.index') }}" class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300">Kembali</a>
        <a href="{{ route('penulis.edit', $penulis->id) }}" class="px-4 py-2 rounded-xl bg-blue-500 hover:bg-blue-600 text-white">Edit</a>
    </div>
</div>
@endsection
