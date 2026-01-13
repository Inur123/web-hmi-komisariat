@extends('user.layouts.app')

@section('title', 'Galeri Kegiatan')

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

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="font-heading font-bold text-4xl lg:text-6xl text-dark text-balance leading-tight mb-6">
                    <span class="gradient-text">Galeri Kegiatan <br></span> HMI Komisariat Fitrah 📸
                </h1>
                <p class="text-lg text-gray-600 text-pretty max-w-3xl mx-auto leading-relaxed">
                    Dokumentasi kegiatan dan momen-momen inspiratif dari kader HMI Komisariat Fitrah.
                </p>
            </div>
        </div>
    </section>


    <!-- Gallery Grid -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($galleries as $gallery)
                    <a href="{{ route('gallery.show', $gallery->id) }}"
                        class="block bg-white rounded-2xl shadow-lg overflow-hidden border border-green-100
                      transform transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:scale-[1.02]">

                        <div class="aspect-video relative overflow-hidden">
                            <img src="{{ asset('storage/' . $gallery->thumbnail) }}" alt="{{ $gallery->nama }}"
                                class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">

                        </div>

                        <div class="p-4">
                            <h2 class="font-bold text-lg mb-2">{{ $gallery->nama }}</h2>
                            <p class="text-gray-600 text-sm mb-2 line-clamp-3">{{ $gallery->deskripsi }}</p>
                            <p class="text-gray-400 text-xs">
                                {{ \Carbon\Carbon::parse($gallery->tanggal)->translatedFormat('d F Y') }}</p>
                        </div>
                    </a>
                @empty
                    <p class="col-span-full text-center text-gray-500">Belum ada galeri.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
