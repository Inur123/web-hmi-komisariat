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
                <div class="group relative">
                    <span
                        class="text-dark cursor-default hover:text-primary font-medium relative flex items-center space-x-1">
                        🧑 Profile
                        <!-- Icon arrow -->
                        <i class="fas fa-angle-down text-xs ml-2"></i>
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                    </span>
                    <!-- Sub-menu -->
                    <div
                        class="absolute left-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300">
                        <a href="{{ route('profile.hmi-komisariat-fitrah') }}"
                            class="block px-4 py-2 text-sm text-dark hover:bg-green-50">🏛️ HMI Komisariat Fitrah</a>
                        <a href="{{ route('profile.daftar-ketua-umum') }}"
                            class="block px-4 py-2 text-sm text-dark hover:bg-green-50">👑 Daftar Ketua Umum</a>
                        <a href="{{ route('profile.program-kami') }}"
                            class="block px-4 py-2 text-sm text-dark hover:bg-green-50">🎯 Program Kami</a>
                        <a href="{{ route('profile.platform') }}"
                            class="block px-4 py-2 text-sm text-dark hover:bg-green-50">💻 Platform</a>
                    </div>
                </div>

                <a href="#tokoh-hmi" class="text-dark hover:text-primary font-medium relative group">
                    🌟 Tokoh HMI
                    <span
                        class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                </a>

                <!-- Pena Kader -->
                <a href="{{ route('pena-kader.index') }}"
                    class="text-dark hover:text-primary font-medium relative group">
                    ✍️ Pena Kader
                    <span
                        class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a href="{{ route('gallery.index') }}" class="text-dark hover:text-primary font-medium relative group">
                    📸 Galeri Kegiatan
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
        <div>
            <button class="w-full flex justify-between items-center text-dark font-medium hover:text-primary"
                onclick="toggleSubMenu()">
                🧑 Profile
                <i id="arrow" class="fas fa-angle-down ml-2"></i>
            </button>
            <div id="sub-menu" class="hidden flex flex-col pl-4 mt-2 space-y-2">
                <a href="{{ route('profile.hmi-komisariat-fitrah') }}" class="text-dark hover:text-primary">🏛️ HMI
                    Komisariat Fitrah</a>
                <a href="{{ route('profile.daftar-ketua-umum') }}" class="text-dark hover:text-primary">👑 Daftar Ketua
                    Umum</a>
                <a href="{{ route('profile.program-kami') }}" class="text-dark hover:text-primary">🎯 Program Kami</a>
                <a href="{{ route('profile.platform') }}" class="text-dark hover:text-primary">💻 Platform</a>
            </div>
        </div>

        <a href="#tokoh-hmi" class="text-dark font-medium hover:text-primary">🌟 Tokoh HMI</a>
        <a href="{{ route('pena-kader.index') }}" class="text-dark font-medium hover:text-primary">✍️ Pena Kader</a>
        <a href="{{ route('gallery.index') }}" class="text-dark font-medium hover:text-primary">
            📸 Galeri Kegiatan
        </a>

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

    function toggleSubMenu() {
        const menu = document.getElementById('sub-menu');
        const arrow = document.getElementById('arrow');

        menu.classList.toggle('hidden');

        if (menu.classList.contains('hidden')) {
            arrow.classList.remove('fa-angle-up');
            arrow.classList.add('fa-angle-down');
        } else {
            arrow.classList.remove('fa-angle-down');
            arrow.classList.add('fa-angle-up');
        }
    }
</script>
