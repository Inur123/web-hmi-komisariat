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
    <meta property="og:image" content="{{ asset('images/logo-fitrah.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">

    {{-- Fonts & Styles --}}
   @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/logo-fitrah.png') }}" type="image/x-icon">
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


    <!-- JavaScript -->
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener("click", function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute("href"));
                if (target) {
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                }
            });
        });

        const mobileMenuButton = document.querySelector("button.md\\:hidden");
        const mobileMenu = document.getElementById("mobile-menu");
        const overlay = document.getElementById("overlay");
        const closeMenuButton = document.getElementById("close-menu");

        if (mobileMenuButton) {
            mobileMenuButton.addEventListener("click", function() {
                mobileMenu.classList.toggle("-translate-x-full");
                overlay.classList.toggle("hidden");
            });
        }

        overlay.addEventListener("click", function() {
            mobileMenu.classList.add("-translate-x-full");
            overlay.classList.add("hidden");
        });

        if (closeMenuButton) {
            closeMenuButton.addEventListener("click", function() {
                mobileMenu.classList.add("-translate-x-full");
                overlay.classList.add("hidden");
            });
        }

        window.addEventListener("scroll", function() {
            const nav = document.querySelector("nav");
            if (window.scrollY > 100) {
                nav.classList.add("shadow-lg");
            } else {
                nav.classList.remove("shadow-lg");
            }
        });

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

        // Carousel functionality
        document.addEventListener("DOMContentLoaded", function() {
            const track = document.getElementById("carousel-track");
            const items = document.querySelectorAll(".carousel-item");
            const prevBtn = document.getElementById("carousel-prev");
            const nextBtn = document.getElementById("carousel-next");
            const indicatorsContainer = document.getElementById(
                "carousel-indicators"
            );

            let currentIndex = 0;
            let itemsPerView;

            function getItemsPerView() {
                if (window.innerWidth >= 768) return 4; // Updated to show 4 items
                return 1;
            }

            function updateCarousel() {
                itemsPerView = getItemsPerView();
                const translateX = -(currentIndex * (100 / itemsPerView));
                track.style.transform = `translateX(${translateX}%)`;
                updateIndicators();
            }

            function createIndicators() {
                indicatorsContainer.innerHTML = "";
                const totalItems = items.length;
                const totalSlides = Math.ceil(totalItems / itemsPerView);

                for (let i = 0; i < totalSlides; i++) {
                    const indicator = document.createElement("button");
                    indicator.classList.add("carousel-indicator");
                    if (i === 0) indicator.classList.add("active");
                    indicator.dataset.index = i;
                    indicator.addEventListener("click", function() {
                        currentIndex = parseInt(this.dataset.index) * itemsPerView;
                        updateCarousel();
                    });
                    indicatorsContainer.appendChild(indicator);
                }
            }

            function updateIndicators() {
                const indicators = document.querySelectorAll(".carousel-indicator");
                const activeIndicator = Math.floor(currentIndex / itemsPerView);

                indicators.forEach((indicator, index) => {
                    if (index === activeIndicator) {
                        indicator.classList.add("active");
                    } else {
                        indicator.classList.remove("active");
                    }
                });
            }

            nextBtn.addEventListener("click", function() {
                itemsPerView = getItemsPerView();
                if (currentIndex < items.length - itemsPerView) {
                    currentIndex += itemsPerView;
                } else {
                    currentIndex = 0;
                }
                updateCarousel();
            });

            prevBtn.addEventListener("click", function() {
                itemsPerView = getItemsPerView();
                if (currentIndex > 0) {
                    currentIndex -= itemsPerView;
                } else {
                    currentIndex =
                        Math.floor((items.length - 1) / itemsPerView) * itemsPerView;
                }
                updateCarousel();
            });

            window.addEventListener("resize", function() {
                itemsPerView = getItemsPerView();
                createIndicators();
                updateCarousel();
            });

            itemsPerView = getItemsPerView();
            createIndicators();
            updateCarousel();
        });
    </script>

</body>

</html>
