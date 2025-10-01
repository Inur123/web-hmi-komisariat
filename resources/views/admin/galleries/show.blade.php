@extends('admin.layouts.app')

@section('title', 'Detail Gallery')

@section('content')
<div class="w-full p-8 bg-white/80 rounded-3xl shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Gallery</h2>

    <div class="grid grid-cols-1 gap-6">
        <!-- Nama -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Nama</label>
            <p class="px-4 py-3 border border-green-200 rounded-2xl bg-gray-50">{{ $gallery->nama }}</p>
        </div>

        <!-- Deskripsi -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Deskripsi</label>
            <p class="px-4 py-3 border border-green-200 rounded-2xl bg-gray-50">{{ $gallery->deskripsi ?? '-' }}</p>
        </div>

        <!-- Tanggal -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Tanggal</label>
            <p class="px-4 py-3 border border-green-200 rounded-2xl bg-gray-50">{{ \Carbon\Carbon::parse($gallery->tanggal)->format('d M Y') }}</p>
        </div>

        <!-- Thumbnail -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Thumbnail</label>
            @if($gallery->thumbnail)
                <img src="{{ asset('storage/' . $gallery->thumbnail) }}" alt="Thumbnail" class="w-48 rounded-lg shadow-md">
            @else
                <p class="text-gray-500">Tidak ada thumbnail</p>
            @endif
        </div>

        <!-- Gambar Kegiatan -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Gambar Kegiatan</label>
            @if($gallery->images->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($gallery->images as $img)
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('storage/' . $img->image) }}" alt="Gambar Kegiatan" class="w-48 rounded-lg shadow-md">
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">Tidak ada gambar kegiatan</p>
            @endif
        </div>

        <div class="flex gap-4 mt-4">
            <a href="{{ route('galleries.edit', $gallery->id) }}"
               class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-2xl font-bold text-center transition-all">
                Edit
            </a>
            <a href="{{ route('galleries.index') }}"
               class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 py-3 rounded-2xl font-bold text-center transition-all">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
