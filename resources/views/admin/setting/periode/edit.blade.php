@extends('admin.layouts.app')

@section('title', 'Edit Periode')

@section('content')
<div class="w-full p-8 bg-white/80 rounded-3xl shadow-lg max-w-md mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Periode</h2>

    <form action="{{ route('periode.update', $periode->id) }}" method="POST" class="grid grid-cols-1 gap-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-bold text-gray-800 mb-2">Nama Periode</label>
            <input type="text" name="nama_periode"
                   value="{{ old('nama_periode', $periode->nama_periode) }}"
                   placeholder="Contoh: 2025/2026"
                   class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
            @error('nama_periode')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol submit full width -->
        <div>
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-2xl font-bold transition-all cursor-pointer">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
