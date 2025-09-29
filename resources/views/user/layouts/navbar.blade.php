@php
    $currentRoute = Route::currentRouteName();
@endphp

<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-green-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 cursor-pointer">
                    <div class="w-12 h-12 flex items-center justify-center">
                        <img src="/images/logo-fitrah.png" alt="HMI Fitrah Logo" class="w-full h-full object-contain" />
                    </div>
                    <div>
                        <h1 class="font-heading font-bold text-lg text-dark">
                            HMI Komisariat Fitrah
                        </h1>
                        <p class="text-xs text-gray-600">
                            Ponorogo
                        </p>
                    </div>
                </a>
            </div>
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#beranda" class="text-dark hover:text-primary font-medium relative group">
                    🏠 Beranda
                    <span
                        class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#tentang" class="text-dark hover:text-primary font-medium relative group">
                    ℹ️ Tentang
                    <span
                        class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#program" class="text-dark hover:text-primary font-medium relative group">
                    🎯 Program
                    <span
                        class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#tokoh-hmi" class="text-dark hover:text-primary font-medium relative group">
                    🌟 Tokoh HMI
                    <span
                        class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                </a>

                <!-- Pena Kader -->
                <a href="{{ route('pena-kader.index') }}"
                    class="text-dark hover:text-primary font-medium relative group">
                    ✍️ Pena Kader
                </a>
                <a href="#kontak" class="text-dark hover:text-primary font-medium relative group">
                    📞 Kontak
                    <span
                        class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            <!-- Hamburger Button -->
            <button class="md:hidden p-2 hover:bg-green-50 rounded-lg transition-colors" id="hamburger-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu"
    class="fixed top-0 left-0 w-64 h-full bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50 flex flex-col">
    <div class="flex items-center space-x-3 p-2 border-b border-gray-200 relative">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 cursor-pointer">
            <div class="w-12 h-12 flex items-center justify-center">
                <img src="/images/logo-fitrah.png" alt="HMI Fitrah Logo" class="w-full h-full object-contain" />
            </div>
            <div>
                <h1 class="font-heading font-bold text-lg text-dark">HMI Fitrah</h1>
                <p class="text-xs text-gray-600">Ponorogo</p>
            </div>
        </a>

        <button id="close-menu" class="absolute top-3 right-3 text-gray-500 hover:text-red-500 text-2xl font-bold">
            &times;
        </button>
    </div>
    <div class="flex-1 p-6 flex flex-col space-y-4">
        <a href="#beranda" class="text-dark font-medium hover:text-primary">🏠 Beranda</a>
        <a href="#tentang" class="text-dark font-medium hover:text-primary">ℹ️ Tentang</a>
        <a href="#program" class="text-dark font-medium hover:text-primary">🎯 Program</a>
        <a href="#tokoh-hmi" class="text-dark font-medium hover:text-primary">🌟 Tokoh HMI</a>
        <a href="{{ route('pena-kader.index') }}" class="text-dark font-medium hover:text-primary">✍️ Pena Kader</a>

        <a href="#kontak" class="text-dark font-medium hover:text-primary">📞 Kontak</a>
    </div>
</div>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black/50 hidden z-40"></div>

<script>
    // Smooth scroll & redirect
    const navLinks = document.querySelectorAll('a[href^="#"], a[href^="/"]');
    navLinks.forEach(link => {
        link.addEventListener("click", function(e) {
            const href = this.getAttribute("href");
            const path = window.location.pathname;

            if (href.startsWith("#") && path !== "/") {
                e.preventDefault();
                window.location.href = "/" + href;
                return;
            }

            if (href.startsWith("#") && path === "/") {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) target.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            }

            closeMenu();
        });
    });
</script>
