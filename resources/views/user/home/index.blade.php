 @extends('user.layouts.app')

 @section('content')
     <!-- Hero Section -->
     <section id="beranda" class="relative py-16 lg:py-50 text-center overflow-hidden">

         <!-- Layer Background -->
         <div id="bg1" class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-100"
             style="background-image: url('{{ asset('images/bg-1.jpeg') }}');"></div>
         <div id="bg2" class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0"
             style="background-image: url('{{ asset('images/bg-2.jpg') }}');"></div>

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
                     class="bg-gradient-to-r from-primary to-secondary text-white px-8 py-4 rounded-2xl font-bold hover:shadow-xl hover:scale-105 transition-all duration-300 pulse-glow text-lg">
                     🚀 Ayo Gabung Sekarang!
                 </button>
                 <button
                     class="border-2 border-white text-white px-8 py-4 rounded-2xl font-bold hover:bg-white hover:text-primary hover:shadow-xl hover:scale-105 transition-all duration-300 text-lg">
                     📖 Kenalan Dulu Yuk
                 </button>
             </div>
         </div>
     </section>
     <!-- Tentang Section -->
     <section id="tentang" class="py-20 bg-white">
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
             <div class="text-center mb-16">
                 <h2 class="font-heading font-bold text-3xl lg:text-4xl text-dark mb-4">
                     Kenalan Sama <span class="gradient-text">HMI Komisariat Fitrah</span> Yuk! 👋
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
                         <span class="text-2xl">📚</span>
                     </div>
                     <h3 class="font-heading font-bold text-xl text-dark mb-4">
                         Belajar Seru! 🎓
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
                         <span class="text-2xl">🕌</span>
                     </div>
                     <h3 class="font-heading font-bold text-xl text-dark mb-4">
                         Dakwah Kreatif! 🎨
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
                         <span class="text-2xl">🤝</span>
                     </div>
                     <h3 class="font-heading font-bold text-xl text-dark mb-4">
                         Aksi Sosial! ❤️
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
                     Program <span class="gradient-text">Kece</span> Kita! 🔥
                 </h2>
                 <p class="text-lg text-gray-600 max-w-3xl mx-auto text-pretty">
                     Ini dia program-program seru yang bakal bikin pengalaman kuliah kamu
                     lebih berkesan dan bermanfaat!
                 </p>
             </div>
             <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                 <div class="bg-white p-6 rounded-3xl shadow-lg card-hover border border-green-100">
                     <div class="text-5xl mb-4 text-center">💡</div>
                     <h3 class="font-heading font-bold text-lg text-dark mb-2 text-center">
                         Ngaji Bareng
                     </h3>
                     <p class="text-gray-600 text-sm text-center">
                         Kajian Islam santai tapi berbobot setiap minggu. Diskusi seru
                         sambil nambah ilmu agama!
                     </p>
                 </div>
                 <div class="bg-white p-6 rounded-3xl shadow-lg card-hover border border-green-100">
                     <div class="text-5xl mb-4 text-center">👑</div>
                     <h3 class="font-heading font-bold text-lg text-dark mb-2 text-center">
                         Leadership Training
                     </h3>
                     <p class="text-gray-600 text-sm text-center">
                         Asah jiwa kepemimpinan dengan workshop dan games seru yang bikin
                         kamu jadi leader kece!
                     </p>
                 </div>
                 <div class="bg-white p-6 rounded-3xl shadow-lg card-hover border border-green-100">
                     <div class="text-5xl mb-4 text-center">❤️</div>
                     <h3 class="font-heading font-bold text-lg text-dark mb-2 text-center">
                         Aksi Peduli
                     </h3>
                     <p class="text-gray-600 text-sm text-center">
                         Kegiatan sosial yang bikin hati adem! Bantu sesama sambil
                         strengthen ukhuwah.
                     </p>
                 </div>
                 <div class="bg-white p-6 rounded-3xl shadow-lg card-hover border border-green-100">
                     <div class="text-5xl mb-4 text-center">🎓</div>
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
                     Tokoh <span class="gradient-text">Inspiratif</span> HMI 🌟
                 </h2>
                 <p class="text-lg text-gray-600 max-w-3xl mx-auto text-pretty">
                     Kenali para tokoh inspiratif HMI yang telah memberikan kontribusi
                     besar bagi organisasi dan masyarakat.
                 </p>
             </div>

             <!-- Carousel Container -->
             <div class="relative">
                 <!-- Carousel Items -->
                 <div class="carousel-container">
                     <div class="carousel-track flex" id="carousel-track">
                         <!-- Tokoh 2 -->
                         <div class="carousel-item">
                             <div
                                 class="bg-gradient-to-br from-accent to-white rounded-2xl overflow-hidden card-hover shadow-md border border-green-100 text-center h-full mx-2 p-3">
                                 <!-- Gambar full di atas -->
                                 <div class="w-full aspect-square overflow-hidden rounded-xl mb-2">
                                     <img src="/images/logo-fitrah.png" alt="Nurcholish Madjid"
                                         class="w-full h-full object-cover" />
                                 </div>

                                 <!-- Konten teks -->
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
                         <div class="carousel-item">
                             <div
                                 class="bg-gradient-to-br from-accent to-white rounded-2xl overflow-hidden card-hover shadow-md border border-green-100 text-center h-full mx-2 p-3">
                                 <!-- Gambar full di atas -->
                                 <div class="w-full aspect-square overflow-hidden rounded-xl mb-2">
                                     <img src="/images/logo-fitrah.png" alt="Nurcholish Madjid"
                                         class="w-full h-full object-cover" />
                                 </div>

                                 <!-- Konten teks -->
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
                         <div class="carousel-item">
                             <div
                                 class="bg-gradient-to-br from-accent to-white rounded-2xl overflow-hidden card-hover shadow-md border border-green-100 text-center h-full mx-2 p-3">
                                 <!-- Gambar full di atas -->
                                 <div class="w-full aspect-square overflow-hidden rounded-xl mb-2">
                                     <img src="/images/logo-fitrah.png" alt="Nurcholish Madjid"
                                         class="w-full h-full object-cover" />
                                 </div>

                                 <!-- Konten teks -->
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
                         <div class="carousel-item">
                             <div
                                 class="bg-gradient-to-br from-accent to-white rounded-2xl overflow-hidden card-hover shadow-md border border-green-100 text-center h-full mx-2 p-3">
                                 <!-- Gambar full di atas -->
                                 <div class="w-full aspect-square overflow-hidden rounded-xl mb-2">
                                     <img src="/images/logo-fitrah.png" alt="Nurcholish Madjid"
                                         class="w-full h-full object-cover" />
                                 </div>

                                 <!-- Konten teks -->
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
                         <div class="carousel-item">
                             <div
                                 class="bg-gradient-to-br from-accent to-white rounded-2xl overflow-hidden card-hover shadow-md border border-green-100 text-center h-full mx-2 p-3">
                                 <!-- Gambar full di atas -->
                                 <div class="w-full aspect-square overflow-hidden rounded-xl mb-2">
                                     <img src="/images/logo-fitrah.png" alt="Nurcholish Madjid"
                                         class="w-full h-full object-cover" />
                                 </div>

                                 <!-- Konten teks -->
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
                         <div class="carousel-item">
                             <div
                                 class="bg-gradient-to-br from-accent to-white rounded-2xl overflow-hidden card-hover shadow-md border border-green-100 text-center h-full mx-2 p-3">
                                 <!-- Gambar full di atas -->
                                 <div class="w-full aspect-square overflow-hidden rounded-xl mb-2">
                                     <img src="/images/logo-fitrah.png" alt="Nurcholish Madjid"
                                         class="w-full h-full object-cover" />
                                 </div>

                                 <!-- Konten teks -->
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
                         <div class="carousel-item">
                             <div
                                 class="bg-gradient-to-br from-accent to-white rounded-2xl overflow-hidden card-hover shadow-md border border-green-100 text-center h-full mx-2 p-3">
                                 <!-- Gambar full di atas -->
                                 <div class="w-full aspect-square overflow-hidden rounded-xl mb-2">
                                     <img src="/images/logo-fitrah.png" alt="Nurcholish Madjid"
                                         class="w-full h-full object-cover" />
                                 </div>

                                 <!-- Konten teks -->
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
                     </div>

                 </div>

                 <!-- Navigation Buttons -->
                 <button class="carousel-btn carousel-prev" id="carousel-prev">
                     <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                         </path>
                     </svg>
                 </button>
                 <button class="carousel-btn carousel-next" id="carousel-next">
                     <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                         </path>
                     </svg>
                 </button>

                 <!-- Indicators -->
                 <div class="carousel-indicators" id="carousel-indicators"></div>
             </div>
         </div>
     </section>

     <!-- Pena Kader Section -->
     <section id="pena-kader" class="py-20 bg-white">
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
             <div class="text-center mb-16">
                 <h2 class="font-heading font-bold text-3xl lg:text-4xl text-dark mb-4">
                     ✍️ Pena <span class="gradient-text">Kader</span>
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
                                 <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : '/images/logo-fitrah.png' }}"
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover transition-transform duration-300">
                             </div>

                             <div class="p-6">
                                 <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                     <span class="text-lg">📅</span>
                                     {{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}
                                 </div>
                                 <h3 class="font-heading font-bold text-xl text-dark mb-3 line-clamp-2">
                                     {{ $post->title }}
                                 </h3>
                                 <p class="text-gray-600 mb-4">
                                     {{ Str::limit(strip_tags($post->content), 120) }}
                                 </p>
                                 <!-- Baca Selengkapnya selalu muncul -->
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
     <script>
         document.addEventListener("DOMContentLoaded", function() {
             const bg1 = document.getElementById("bg1");
             const bg2 = document.getElementById("bg2");

             const images = [
                 "{{ asset('images/bg-1.jpeg') }}",
                 "{{ asset('images/bg-2.jpg') }}"
             ];

             let index = 0;
             let showingBg1 = true;

             setInterval(() => {
                 index = (index + 1) % images.length;

                 if (showingBg1) {
                     bg2.style.backgroundImage = `url('${images[index]}')`;
                     bg2.classList.remove("opacity-0");
                     bg2.classList.add("opacity-100");
                     bg1.classList.remove("opacity-100");
                     bg1.classList.add("opacity-0");
                 } else {
                     bg1.style.backgroundImage = `url('${images[index]}')`;
                     bg1.classList.remove("opacity-0");
                     bg1.classList.add("opacity-100");
                     bg2.classList.remove("opacity-100");
                     bg2.classList.add("opacity-0");
                 }

                 showingBg1 = !showingBg1;
             }, 7000); // ganti tiap 7 detik
         });
     </script>
 @endsection
