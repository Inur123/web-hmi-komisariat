<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="color-scheme" content="light dark">
    <title>
        @if (Route::currentRouteName() === 'home')
            HMI Komisariat Fitrah Ponorogo
        @elseif (View::hasSection('title'))
            @yield('title') – HMI Komisariat Fitrah Ponorogo
        @else
            HMI Komisariat Fitrah Ponorogo
        @endif
    </title>
    @yield('meta')
    {{-- SEO Meta Tags --}}
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="description"
        content="HMI Komisariat Fitrah Ponorogo – Informasi, kegiatan, dan update terbaru HMI Komisariat Fitrah, HMI Cabang Ponorogo, organisasi mahasiswa di Ponorogo, Jawa Timur.">
    <meta name="keywords"
        content="HMI, Komisariat Fitrah, HMI Ponorogo, HMI Cabang Ponorogo, organisasi mahasiswa Ponorogo, HMI Jawa Timur, kegiatan mahasiswa">
    <meta name="author" content="HMI Komisariat Fitrah Ponorogo">
    <meta name="robots" content="index, follow">

    {{-- Open Graph --}}
    <meta property="og:title" content="HMI Komisariat Fitrah Ponorogo">
    <meta property="og:description"
        content="HMI Komisariat Fitrah Ponorogo – Informasi, kegiatan, dan update terbaru HMI Komisariat Fitrah, HMI Cabang Ponorogo, organisasi mahasiswa di Ponorogo, Jawa Timur.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('images/logo-fitrah.webp') }}">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">

    {{-- Fonts & Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/logo-fitrah.webp') }}" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body class="font-body bg-white text-dark leading-relaxed">
    <!-- Navigation -->
    @include('user.layouts.navbar')

    @yield('content')
    <!-- Kontak Section -->


    <!-- Footer -->
    @include('user.layouts.footer')


    <!-- Alpine.js Scripts -->
    <script>
        // Scroll observer for animations
        document.addEventListener('alpine:init', () => {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px",
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("animate-fade-in");
                    }
                });
            }, observerOptions);

            document.querySelectorAll("section").forEach((section) => {
                observer.observe(section);
            });
        });
    </script>

</body>

</html>
