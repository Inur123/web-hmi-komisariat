@extends('user.layouts.app')

@section('title', 'HMI Komisariat Fitrah')

@section('content')
<section class="relative bg-gradient-to-br from-green-50 via-white to-green-100 py-20 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-secondary/20 to-primary/20 rounded-full blur-3xl animate-bounce-slow"></div>
        <div class="absolute top-20 left-20 text-4xl animate-bounce">🏛️</div>
        <div class="absolute top-40 right-32 text-3xl animate-wiggle">📖</div>
        <div class="absolute bottom-32 left-32 text-3xl animate-pulse">🌱</div>
    </div>

   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
    <h1 class="font-heading font-bold text-4xl lg:text-6xl text-dark mb-6 leading-tight">
        <span class="gradient-text">Sejarah & Profil</span> <br>
        HMI Komisariat Fitrah 📖
    </h1>
    <p class="text-lg text-gray-600 text-pretty max-w-3xl mx-auto leading-relaxed">
        Menyajikan sejarah singkat, visi, dan misi <span class="font-semibold text-primary">HMI Komisariat Fitrah</span>.
        (Konten masih dummy untuk sementara).
    </p>
</div>

</section>

<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4 text-gray-700 leading-relaxed">
        <h2 class="text-2xl font-bold mb-4">Sejarah Singkat</h2>
        <p class="mb-6">HMI Komisariat Fitrah berdiri sebagai wadah perjuangan mahasiswa dalam mengembangkan intelektual, spiritual, dan sosial. (Dummy text)</p>

        <h2 class="text-2xl font-bold mb-4">Visi</h2>
        <p class="mb-6">Menjadi organisasi kader yang berorientasi pada pengembangan kualitas intelektual dan kepemimpinan mahasiswa. (Dummy text)</p>

        <h2 class="text-2xl font-bold mb-4">Misi</h2>
        <ul class="list-disc pl-6 space-y-2">
            <li>Mengembangkan potensi kader melalui pendidikan dan pelatihan.</li>
            <li>Mendorong peran aktif mahasiswa dalam pengabdian masyarakat.</li>
            <li>Menjaga nilai-nilai keislaman dan kebangsaan.</li>
        </ul>
    </div>
</section>
@endsection
