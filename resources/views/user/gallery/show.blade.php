@extends('user.layouts.app')

@section('title', $gallery->nama)

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-green-50 via-white to-green-100 py-20 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <!-- Background circles -->
            <div
                class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-full blur-3xl animate-pulse-slow">
            </div>
            <div
                class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-secondary/20 to-primary/20 rounded-full blur-3xl animate-bounce-slow">
            </div>

            <!-- Decorative icons -->
            <div class="absolute top-20 left-20 text-4xl animate-bounce">📸</div>
            <div class="absolute top-40 right-32 text-3xl animate-wiggle">🖼️</div>
            <div class="absolute bottom-32 left-32 text-3xl animate-pulse">✨</div>
        </div>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="font-heading font-bold text-4xl lg:text-6xl gradient-text text-balance leading-tight mb-6">
                    {{ $gallery->nama }}
                </h1>
                <p class="text-lg text-gray-600 text-pretty max-w-3xl mx-auto leading-relaxed mb-4">
                    {{ $gallery->deskripsi }}
                </p>
                <p class="text-gray-400 text-sm">
                    {{ \Carbon\Carbon::parse($gallery->tanggal)->translatedFormat('d F Y') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Gallery Images -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($gallery->images as $img)
                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('storage/' . $img->image) }}" alt="{{ $gallery->nama }}"
                            class="w-full h-48 object-cover">
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">Belum ada gambar.</p>
                @endforelse
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('gallery.index') }}"
                    class="inline-block bg-gradient-to-r from-primary to-secondary text-white font-bold py-3 px-6 rounded-2xl hover:shadow-xl hover:scale-105 transition-all duration-300 text-lg">
                    &larr; Kembali ke Galeri
                </a>
            </div>

        </div>
    </section>
@endsection
