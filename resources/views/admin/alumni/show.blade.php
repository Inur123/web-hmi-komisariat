@extends('admin.layouts.app')

@section('title', 'Detail Alumni')

@section('content')
<div class="w-full p-8 bg-white/80 rounded-3xl shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Alumni</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Foto -->
        <div class="flex flex-col items-center md:items-start">
            @php
                $name = $alumnus->nama ?? 'Alumni';
                $photo = $alumnus->foto ?? null;

                $words = explode(' ', trim($name));
                $initials = strtoupper(
                    (isset($words[0]) ? substr($words[0], 0, 1) : '') .
                    (isset($words[1]) ? substr($words[1], 0, 1) : '')
                );
            @endphp

            @if($photo)
                <img src="{{ asset('storage/' . $photo) }}" alt="{{ $name }}"
                     class="w-32 h-32 rounded-xl object-cover mb-4">
            @else
                <div class="w-32 h-32 bg-gradient-to-br from-green-600 to-green-400 rounded-xl flex items-center justify-center text-white font-bold mb-4 text-2xl">
                    {{ $initials }}
                </div>
            @endif
        </div>

        <!-- Data Alumni -->
        <div class="space-y-4">
            <p><strong>Nama:</strong> {{ $alumnus->nama }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $alumnus->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
            <p><strong>Alamat:</strong> {{ $alumnus->alamat ?? '-' }}</p>
            <p><strong>No HP:</strong> {{ $alumnus->nohp ?? '-' }}</p>
            <p><strong>Fakultas:</strong> {{ $alumnus->fakultas ?? '-' }}</p>
            <p><strong>Prodi:</strong> {{ $alumnus->prodi ?? '-' }}</p>
            <p><strong>Periode:</strong> {{ $alumnus->periode ?? '-' }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('alumni.index') }}"
           class="px-5 py-3 bg-gray-300 hover:bg-gray-400 rounded-2xl transition-all">
           Kembali
        </a>
    </div>
</div>
@endsection
