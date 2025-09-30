@extends('user.layouts.app')

@section('title', 'Platform')

@section('content')
<section class="relative bg-gradient-to-br from-green-50 via-white to-green-100 py-20 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-secondary/20 to-primary/20 rounded-full blur-3xl animate-bounce-slow"></div>
        <div class="absolute top-20 left-20 text-4xl animate-bounce">💻</div>
        <div class="absolute top-40 right-32 text-3xl animate-wiggle">⚡</div>
        <div class="absolute bottom-32 left-32 text-3xl animate-pulse">🌐</div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
    <h1 class="font-heading font-bold text-4xl lg:text-6xl text-dark mb-6 leading-tight">
        <span class="gradient-text">Platform Digital</span> <br>
        HMI Komisariat Fitrah 💻
    </h1>
    <p class="text-lg text-gray-600 text-pretty max-w-3xl mx-auto leading-relaxed">
        Teknologi yang mendukung aktivitas dan perkembangan <span class="font-semibold text-primary">kaderisasi</span>.
        (Konten masih dummy).
    </p>
</div>

</section>

<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4 text-gray-700 leading-relaxed grid md:grid-cols-3 gap-8">
        <div class="p-6 bg-green-50 rounded-xl shadow text-center">
            <h3 class="font-bold text-xl mb-2">🌐 Website Resmi</h3>
            <p>Sumber informasi resmi kegiatan komisariat. (Dummy)</p>
        </div>
        <div class="p-6 bg-green-50 rounded-xl shadow text-center">
            <h3 class="font-bold text-xl mb-2">📱 Media Sosial</h3>
            <p>Sarana publikasi dan komunikasi dengan kader. (Dummy)</p>
        </div>
        <div class="p-6 bg-green-50 rounded-xl shadow text-center">
            <h3 class="font-bold text-xl mb-2">🎥 Channel Digital</h3>
            <p>Konten edukasi dan dokumentasi kegiatan. (Dummy)</p>
        </div>
    </div>
</section>
@endsection
