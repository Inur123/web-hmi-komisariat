@extends('admin.layouts.app')

@section('title', 'Tambah Alumni')

@section('content')
<div class="w-full p-8 bg-white/80 rounded-3xl shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Alumni</h2>

    <form action="{{ route('alumni.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <div>
            <label class="block font-bold text-gray-800 mb-2">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
            @error('nama') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-bold text-gray-800 mb-2">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-bold text-gray-800 mb-2">Alamat</label>
            <textarea name="alamat" rows="3"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">{{ old('alamat') }}</textarea>
        </div>

        <div>
            <label class="block font-bold text-gray-800 mb-2">No HP</label>
            <input type="text" name="nohp" value="{{ old('nohp') }}"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
        </div>

        <div>
            <label class="block font-bold text-gray-800 mb-2">Foto</label>
            <input type="file" name="foto" class="w-full px-4 py-3 border border-green-200 rounded-2xl bg-white focus:outline-none">
        </div>

        <div>
            <label class="block font-bold text-gray-800 mb-2">Fakultas</label>
            <input type="text" name="fakultas" value="{{ old('fakultas') }}"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
        </div>

        <div>
            <label class="block font-bold text-gray-800 mb-2">Prodi</label>
            <input type="text" name="prodi" value="{{ old('prodi') }}"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
        </div>

        <div>
            <label class="block font-bold text-gray-800 mb-2">Periode</label>
            <input type="text" name="periode" value="{{ old('periode') }}"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
        </div>

        <!-- Tombol submit full width -->
        <div class="md:col-span-2">
            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-2xl font-bold transition-all cursor-pointer">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
