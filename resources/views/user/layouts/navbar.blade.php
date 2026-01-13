@php
    $currentRoute = Route::currentRouteName();

    // helper class active (opsional)
    $linkBase = 'text-dark hover:text-primary font-medium relative group flex items-center gap-2 transition-colors';
    $linkLine = 'absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full';
@endphp

<nav id="site-nav" class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-green-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Brand -->
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-11 h-11 flex items-center justify-center">
                    <img src="/images/logo-fitrah.webp" alt="HMI Fitrah Logo" class="w-full h-full object-contain" />
                </div>
                <div class="leading-tight">
                    <h1 class="font-heading font-bold text-base sm:text-lg text-dark">
                        HMI Komisariat Fitrah
                    </h1>
                    <p class="text-xs text-gray-600">Ponorogo</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8">
                <a href="#beranda" class="{{ $linkBase }}">
                    <i class="fa-solid fa-house text-primary/90 group-hover:text-primary transition-colors"></i>
                    <span>Beranda</span>
                    <span class="{{ $linkLine }}"></span>
                </a>

                <!-- Profile Dropdown (Desktop) -->
                <div class="group relative">
                    <button type="button"
                        class="text-dark hover:text-primary font-medium relative flex items-center gap-2 transition-colors cursor-default">
                        <i class="fa-solid fa-user text-primary/90 group-hover:text-primary transition-colors"></i>
                        <span>Profile</span>
                        <i
                            class="fa-solid fa-angle-down text-xs ml-1 text-gray-600 group-hover:text-primary transition-all duration-300 group-hover:rotate-180"></i>
                        <span class="{{ $linkLine }}"></span>
                    </button>

                    <div
                        class="absolute left-0 mt-2 w-60 bg-white border border-gray-200 rounded-xl shadow-lg
                                opacity-0 invisible translate-y-1
                                group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                                transition-all duration-200 overflow-hidden">
                        <a href="{{ route('profile.hmi-komisariat-fitrah') }}"
                            class="flex items-center gap-2 px-4 py-3 text-sm text-dark hover:bg-green-50">
                            <i class="fa-solid fa-landmark text-primary/90 w-4"></i>
                            <span>HMI Komisariat Fitrah</span>
                        </a>
                        <a href="{{ route('profile.daftar-ketua-umum') }}"
                            class="flex items-center gap-2 px-4 py-3 text-sm text-dark hover:bg-green-50">
                            <i class="fa-solid fa-crown text-primary/90 w-4"></i>
                            <span>Daftar Ketua Umum</span>
                        </a>
                        <a href="{{ route('profile.program-kami') }}"
                            class="flex items-center gap-2 px-4 py-3 text-sm text-dark hover:bg-green-50">
                            <i class="fa-solid fa-bullseye text-primary/90 w-4"></i>
                            <span>Program Kami</span>
                        </a>
                        <a href="{{ route('profile.platform') }}"
                            class="flex items-center gap-2 px-4 py-3 text-sm text-dark hover:bg-green-50">
                            <i class="fa-solid fa-laptop-code text-primary/90 w-4"></i>
                            <span>Platform</span>
                        </a>
                    </div>
                </div>

                <a href="#tokoh-hmi" class="{{ $linkBase }}">
                    <i class="fa-solid fa-star text-primary/90 group-hover:text-primary transition-colors"></i>
                    <span>Tokoh HMI</span>
                    <span class="{{ $linkLine }}"></span>
                </a>

                <a href="{{ route('pena-kader.index') }}" class="{{ $linkBase }}">
                    <i class="fa-solid fa-pen-nib text-primary/90 group-hover:text-primary transition-colors"></i>
                    <span>Pena Kader</span>
                    <span class="{{ $linkLine }}"></span>
                </a>

                <a href="{{ route('gallery.index') }}" class="{{ $linkBase }}">
                    <i class="fa-solid fa-camera-retro text-primary/90 group-hover:text-primary transition-colors"></i>
                    <span>Galeri Kegiatan</span>
                    <span class="{{ $linkLine }}"></span>
                </a>
            </div>

            <!-- Hamburger Button -->
            <button id="hamburger-btn" type="button"
                class="md:hidden p-2 rounded-lg hover:bg-green-50 transition-colors" aria-controls="mobile-menu"
                aria-expanded="false" aria-label="Buka menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black/50 hidden z-40"></div>

<!-- Mobile Menu -->
<aside id="mobile-menu"
    class="fixed top-0 left-0 h-full w-80 max-w-[85vw] bg-white shadow-xl z-50
              transform -translate-x-full transition-transform duration-300 will-change-transform flex flex-col">
    <!-- Header -->
    <div class="flex items-center gap-3 px-4 py-3 border-b border-gray-200 relative">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="w-11 h-11 flex items-center justify-center">
                <img src="/images/logo-fitrah.webp" alt="HMI Fitrah Logo" class="w-full h-full object-contain" />
            </div>
            <div class="leading-tight">
                <h1 class="font-heading font-bold text-base text-dark">HMI Fitrah</h1>
                <p class="text-xs text-gray-600">Ponorogo</p>
            </div>
        </a>

        <button id="close-menu" type="button"
            class="absolute right-3 top-3 w-9 h-9 grid place-items-center rounded-lg
                       text-gray-500 hover:text-red-500 hover:bg-red-50 transition"
            aria-label="Tutup menu">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>
    </div>

    <!-- Content -->
    <div class="flex-1 px-5 py-5 flex flex-col gap-3 overflow-y-auto">
        <a href="#beranda" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-50 transition">
            <i class="fa-solid fa-house text-primary/90 w-5"></i>
            <span class="text-dark font-medium">Beranda</span>
        </a>

        <!-- Profile (Mobile) -->
        <div class="rounded-xl border border-gray-200 overflow-hidden">
            <button id="profile-toggle" type="button"
                class="w-full flex items-center justify-between px-3 py-3 hover:bg-green-50 transition">
                <span class="flex items-center gap-3">
                    <i class="fa-solid fa-user text-primary/90 w-5"></i>
                    <span class="text-dark font-medium">Profile</span>
                </span>
                <i id="profile-arrow"
                    class="fa-solid fa-angle-down text-gray-600 transition-transform duration-300"></i>
            </button>

            <div id="sub-menu" class="hidden bg-white">
                <a href="{{ route('profile.hmi-komisariat-fitrah') }}"
                    class="flex items-center gap-3 px-5 py-2.5 hover:bg-green-50 transition">
                    <i class="fa-solid fa-landmark text-primary/90 w-5"></i>
                    <span class="text-dark">HMI Komisariat Fitrah</span>
                </a>
                <a href="{{ route('profile.daftar-ketua-umum') }}"
                    class="flex items-center gap-3 px-5 py-2.5 hover:bg-green-50 transition">
                    <i class="fa-solid fa-crown text-primary/90 w-5"></i>
                    <span class="text-dark">Daftar Ketua Umum</span>
                </a>
                <a href="{{ route('profile.program-kami') }}"
                    class="flex items-center gap-3 px-5 py-2.5 hover:bg-green-50 transition">
                    <i class="fa-solid fa-bullseye text-primary/90 w-5"></i>
                    <span class="text-dark">Program Kami</span>
                </a>
                <a href="{{ route('profile.platform') }}"
                    class="flex items-center gap-3 px-5 py-2.5 hover:bg-green-50 transition">
                    <i class="fa-solid fa-laptop-code text-primary/90 w-5"></i>
                    <span class="text-dark">Platform</span>
                </a>
            </div>
        </div>

        <a href="#tokoh-hmi" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-50 transition">
            <i class="fa-solid fa-star text-primary/90 w-5"></i>
            <span class="text-dark font-medium">Tokoh HMI</span>
        </a>

        <a href="{{ route('pena-kader.index') }}"
            class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-50 transition">
            <i class="fa-solid fa-pen-nib text-primary/90 w-5"></i>
            <span class="text-dark font-medium">Pena Kader</span>
        </a>

        <a href="{{ route('gallery.index') }}"
            class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-50 transition">
            <i class="fa-solid fa-camera-retro text-primary/90 w-5"></i>
            <span class="text-dark font-medium">Galeri Kegiatan</span>
        </a>
    </div>
</aside>

<script>
    (() => {
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('overlay');
        const closeBtn = document.getElementById('close-menu');

        const profileToggle = document.getElementById('profile-toggle');
        const subMenu = document.getElementById('sub-menu');
        const profileArrow = document.getElementById('profile-arrow');

        const NAV_OFFSET = 80; // offset untuk sticky navbar

        function openMenu() {
            mobileMenu.classList.remove('-translate-x-full');
            mobileMenu.classList.add('translate-x-0');
            overlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            hamburgerBtn?.setAttribute('aria-expanded', 'true');
        }

        function closeMenu() {
            mobileMenu.classList.add('-translate-x-full');
            mobileMenu.classList.remove('translate-x-0');
            overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            hamburgerBtn?.setAttribute('aria-expanded', 'false');
        }

        function toggleSubMenu() {
            const isHidden = subMenu.classList.toggle('hidden');
            profileArrow.classList.toggle('rotate-180', !isHidden);
        }

        hamburgerBtn?.addEventListener('click', openMenu);
        closeBtn?.addEventListener('click', closeMenu);
        overlay?.addEventListener('click', closeMenu);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeMenu();
        });

        profileToggle?.addEventListener('click', toggleSubMenu);

        // Smooth scroll untuk anchor (#...), jika bukan di "/" maka redirect ke "/#..."
        document.addEventListener('click', (e) => {
            const a = e.target.closest('a');
            if (!a) return;

            const href = a.getAttribute('href');
            if (!href) return;

            // kalau klik item mobile menu, auto close
            const clickedInsideMobile = a.closest('#mobile-menu');
            if (clickedInsideMobile) closeMenu();

            if (!href.startsWith('#')) return;

            const path = window.location.pathname;

            // dari page lain -> redirect ke home + anchor
            if (path !== '/') {
                e.preventDefault();
                window.location.href = '/' + href;
                return;
            }

            // di home -> smooth scroll + offset
            const target = document.querySelector(href);
            if (!target) return;

            e.preventDefault();
            const top = target.getBoundingClientRect().top + window.pageYOffset - NAV_OFFSET;
            window.scrollTo({
                top,
                behavior: 'smooth'
            });
        });
    })();
</script>
