@extends('user.layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="relative py-16 lg:py-50 text-center overflow-hidden"
             x-data="{
                 currentBg: 0,
                 backgrounds: [
                     '{{ asset('images/bg-new-1.webp') }}',
                     '{{ asset('images/bg-2.jpg') }}'
                 ]
             }"
             x-init="setInterval(() => { currentBg = (currentBg + 1) % backgrounds.length }, 7000)">

        <!-- Layer Background -->
        <div :style="`background-image: url('${backgrounds[0]}'); opacity: ${currentBg === 0 ? 1 : 0}`"
             class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000"></div>
        <div :style="`background-image: url('${backgrounds[1]}'); opacity: ${currentBg === 1 ? 1 : 0}`"
             class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000"></div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>

        <div
            class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center text-white space-y-8">

            <!-- Judul + Subjudul -->
            <div class="space-y-4">
                <h1 class="font-heading text-primary font-bold text-4xl lg:text-6xl leading-tight">
                    HMI Komisariat Fitrah
                </h1>
                <h2 class="font-heading font-semibold text-2xl lg:text-3xl">
                    Ponorogo - Tempat Berkembang Bareng!
                </h2>
                <p class="text-lg max-w-2xl mx-auto leading-relaxed">
                    Organisasi mahasiswa Islam yang seru banget! Di sini kamu bisa belajar, berkarya,
                    dan berkontribusi untuk masyarakat dengan cara yang fun dan bermakna. Ayo join! 🤝
                </p>
            </div>

            <!-- Tombol -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button
                    class="bg-gradient-to-r from-primary to-secondary text-white px-8 py-4 rounded-2xl font-bold hover:shadow-xl hover:scale-105 transition-all duration-300 pulse-glow text-lg flex items-center justify-center gap-3">
                    <i class="fa-solid fa-rocket text-white/95"></i>
                    <span>Ayo Gabung Sekarang!</span>
                </button>

                <button
                    class="border-2 border-white text-white px-8 py-4 rounded-2xl font-bold hover:bg-white hover:text-primary hover:shadow-xl hover:scale-105 transition-all duration-300 text-lg flex items-center justify-center gap-3">
                    <i class="fa-solid fa-book-open text-white/95 group-hover:text-primary"></i>
                    <span>Kenalan Dulu Yuk</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="font-heading font-bold text-3xl lg:text-4xl text-dark mb-4">
                    Kenalan Sama <span class="gradient-text">HMI Komisariat Fitrah</span> Yuk!
                    <i class="fa-solid fa-hand-wave text-primary ml-1"></i>
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto text-pretty">
                    HMI Komisariat Fitrah itu tempat yang asik buat mahasiswa Islam berkembang
                    bareng! Kita fokus ke 3 hal keren yang bikin hidup lebih bermakna
                    dan menyenangkan.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-gradient-to-br from-accent to-white p-8 rounded-3xl text-center card-hover shadow-lg border border-green-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fa-solid fa-book text-2xl text-white"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-dark mb-4">
                        Belajar Seru! <i class="fa-solid fa-graduation-cap text-primary ml-1"></i>
                    </h3>
                    <p class="text-gray-600">
                        Upgrade skill akademik dan intelektual dengan cara yang fun! Ada
                        diskusi, workshop, dan kegiatan edukatif yang bikin kamu makin
                        pinter.
                    </p>
                </div>

                <div
                    class="bg-gradient-to-br from-accent to-white p-8 rounded-3xl text-center card-hover shadow-lg border border-green-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fa-solid fa-mosque text-2xl text-white"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-dark mb-4">
                        Dakwah Kreatif! <i class="fa-solid fa-palette text-primary ml-1"></i>
                    </h3>
                    <p class="text-gray-600">
                        Sharing nilai-nilai Islam dengan cara yang kekinian dan kreatif.
                        Dari kajian santai sampai konten digital yang inspiring!
                    </p>
                </div>

                <div
                    class="bg-gradient-to-br from-accent to-white p-8 rounded-3xl text-center card-hover shadow-lg border border-green-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fa-solid fa-handshake-angle text-2xl text-white"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-dark mb-4">
                        Aksi Sosial! <i class="fa-solid fa-heart text-primary ml-1"></i>
                    </h3>
                    <p class="text-gray-600">
                        Terjun langsung bantu masyarakat dengan berbagai kegiatan sosial
                        yang meaningful. Bikin dampak positif bareng-bareng!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section id="program" class="py-20 bg-gradient-to-br from-green-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="font-heading font-bold text-3xl lg:text-4xl text-dark mb-4">
                    Program <span class="gradient-text">Kece</span> Kita!
                    <i class="fa-solid fa-fire-flame-curved text-primary ml-1"></i>
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto text-pretty">
                    Ini dia program-program seru yang bakal bikin pengalaman kuliah kamu
                    lebih berkesan dan bermanfaat!
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-3xl shadow-lg card-hover border border-green-100">
                    <div class="text-5xl mb-4 text-center text-primary">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-dark mb-2 text-center">
                        Ngaji Bareng
                    </h3>
                    <p class="text-gray-600 text-sm text-center">
                        Kajian Islam santai tapi berbobot setiap minggu. Diskusi seru
                        sambil nambah ilmu agama!
                    </p>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-lg card-hover border border-green-100">
                    <div class="text-5xl mb-4 text-center text-primary">
                        <i class="fa-solid fa-crown"></i>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-dark mb-2 text-center">
                        Leadership Training
                    </h3>
                    <p class="text-gray-600 text-sm text-center">
                        Asah jiwa kepemimpinan dengan workshop dan games seru yang bikin
                        kamu jadi leader kece!
                    </p>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-lg card-hover border border-green-100">
                    <div class="text-5xl mb-4 text-center text-primary">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-dark mb-2 text-center">
                        Aksi Peduli
                    </h3>
                    <p class="text-gray-600 text-sm text-center">
                        Kegiatan sosial yang bikin hati adem! Bantu sesama sambil
                        strengthen ukhuwah.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-lg card-hover border border-green-100">
                    <div class="text-5xl mb-4 text-center text-primary">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-dark mb-2 text-center">
                        Beasiswa Cerdas
                    </h3>
                    <p class="text-gray-600 text-sm text-center">
                        Program bantuan untuk teman-teman berprestasi yang butuh support
                        finansial.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tokoh HMI Section -->
    <section id="tokoh-hmi" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-heading font-bold text-3xl lg:text-4xl text-dark mb-4">
                    Tokoh <span class="gradient-text">Inspiratif</span> HMI
                    <i class="fa-solid fa-star text-primary ml-1"></i>
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto text-pretty">
                    Kenali para tokoh inspiratif HMI yang telah memberikan kontribusi
                    besar bagi organisasi dan masyarakat.
                </p>
            </div>

            <!-- Carousel Container -->
            <div class="relative"
                 x-data="{
                     currentIndex: 0,
                     itemsPerView: window.innerWidth >= 768 ? 4 : 1,
                     totalItems: 7,
                     get totalSlides() { return Math.ceil(this.totalItems / this.itemsPerView) },
                     get translateX() { return -(this.currentIndex * (100 / this.itemsPerView)) },
                     next() {
                         if (this.currentIndex < this.totalItems - this.itemsPerView) {
                             this.currentIndex += this.itemsPerView;
                         } else {
                             this.currentIndex = 0;
                         }
                     },
                     prev() {
                         if (this.currentIndex > 0) {
                             this.currentIndex -= this.itemsPerView;
                         } else {
                             this.currentIndex = Math.floor((this.totalItems - 1) / this.itemsPerView) * this.itemsPerView;
                         }
                     },
                     goToSlide(index) {
                         this.currentIndex = index * this.itemsPerView;
                     },
                     updateItemsPerView() {
                         this.itemsPerView = window.innerWidth >= 768 ? 4 : 1;
                     }
                 }"
                 x-init="window.addEventListener('resize', () => updateItemsPerView())"
                 @resize.window="updateItemsPerView()">
                <!-- Carousel Items -->
                <div class="carousel-container">
                    <div class="carousel-track flex" :style="`transform: translateX(${translateX}%)`">
                        @for ($i = 0; $i < 7; $i++)
                            <div class="carousel-item">
                                <div
                                    class="bg-gradient-to-br from-accent to-white rounded-2xl overflow-hidden card-hover shadow-md border border-green-100 text-center h-full mx-2 p-3">
                                    <div class="w-full aspect-square overflow-hidden rounded-xl mb-2">
                                        <img src="{{ asset('images/logo-fitrah.webp') }}" alt="Nurcholish Madjid"
                                            class="w-full h-full object-cover" />
                                    </div>

                                    <div class="p-1">
                                        <h3 class="font-heading font-bold text-base text-dark mb-1">
                                            Nurcholish Madjid
                                        </h3>
                                        <p class="text-primary font-medium text-xs mb-1">
                                            Cendekiawan Muslim
                                        </p>
                                        <p class="text-gray-600 text-[10px]">
                                            Tokoh pembaruan pemikiran Islam, mantan Ketua Umum PB HMI.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button @click="prev()" class="carousel-btn carousel-prev" type="button">
                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <button @click="next()" class="carousel-btn carousel-next" type="button">
                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Indicators -->
                <div class="carousel-indicators">
                    <template x-for="i in totalSlides" :key="i">
                        <button @click="goToSlide(i-1)"
                                :class="Math.floor(currentIndex / itemsPerView) === (i-1) ? 'active' : ''"
                                class="carousel-indicator"></button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- Pena Kader Section -->
    <section id="pena-kader" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="font-heading font-bold text-3xl lg:text-4xl text-dark mb-4">
                    <i class="fa-solid fa-pen-nib text-primary mr-2"></i>
                    Pena <span class="gradient-text">Kader</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto text-pretty">
                    Temukan tulisan inspiratif dari kader HMI Komisariat Fitrah. Baca, resapi, dan sebarkan ilmu!
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($recentPosts as $post)
                    <a href="{{ route('pena-kader.show', $post->slug) }}" class="block">
                        <article
                            class="bg-gradient-to-br from-accent to-white rounded-3xl overflow-hidden card-hover shadow-lg border border-green-100 transition-transform transform hover:-translate-y-1 hover:shadow-2xl">

                            <div class="aspect-video relative overflow-hidden">
                                <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : '/images/logo-fitrah.webp' }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover transition-transform duration-300">
                            </div>

                            <div class="p-6">
                                <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                    <i class="fa-solid fa-calendar-days text-primary"></i>
                                    {{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}
                                </div>

                                <h3 class="font-heading font-bold text-xl text-dark mb-3 line-clamp-2">
                                    {{ $post->title }}
                                </h3>

                                <p class="text-gray-600 mb-4">
                                    {{ Str::limit(strip_tags($post->content), 120) }}
                                </p>

                                <span class="text-primary font-bold flex items-center gap-2">
                                    Baca Selengkapnya <span>→</span>
                                </span>
                            </div>
                        </article>
                    </a>
                @endforeach
            </div>

            <div class="mt-5 text-center">
                <a href="{{ route('pena-kader.index') }}"
                    class="inline-block bg-primary text-white font-bold px-6 py-3 rounded-2xl hover:bg-secondary transition-colors">
                    Lihat Semua Pena Kader
                </a>
            </div>
        </div>
    </section>
@endsection
