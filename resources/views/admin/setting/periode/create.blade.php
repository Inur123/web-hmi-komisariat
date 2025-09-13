@extends('admin.layouts.app')

@section('title', 'Tambah Periode')

@section('content')
<div class="w-full p-8 bg-white/80 rounded-3xl shadow-lg max-w-md mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Periode</h2>

    <form action="{{ route('periode.store') }}" method="POST" class="grid grid-cols-1 gap-6">
        @csrf

        <div>
            <label class="block font-bold text-gray-800 mb-2">Nama Periode</label>
            <input type="text" name="nama_periode" value="{{ old('nama_periode') }}"
                   placeholder="Contoh: 2025/2026"
                   class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
            @error('nama_periode')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol submit full width -->
        <div>
            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-2xl font-bold transition-all cursor-pointer">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
