@extends('admin.layouts.app')

@section('title', 'Tambah Penulis')

@section('content')
<div class="w-full p-8 bg-white/80 rounded-3xl shadow-lg max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Penulis</h2>

    <form action="{{ route('penulis.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <div>
            <label class="block font-bold text-gray-800 mb-2">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none" required>
            @error('nama') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-bold text-gray-800 mb-2">Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan') }}"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none" required>
            @error('jabatan') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="block font-bold text-gray-800 mb-2">Foto</label>
            <input type="file" name="foto" class="w-full px-4 py-3 border border-green-200 rounded-2xl bg-white focus:outline-none">
            @error('foto') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="block font-bold text-gray-800 mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">{{ old('deskripsi') }}</textarea>
            @error('deskripsi') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Tombol submit full width -->
        <div class="md:col-span-2 flex justify-end space-x-2">
            <a href="{{ route('penulis.index') }}" class="px-6 py-3 rounded-2xl bg-gray-200 hover:bg-gray-300">Batal</a>
            <button type="submit" class="px-6 py-3 rounded-2xl bg-green-600 hover:bg-green-700 text-white font-bold">Simpan</button>
        </div>
    </form>
</div>
@endsection
