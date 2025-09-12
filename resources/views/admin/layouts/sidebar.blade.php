<!-- Sidebar dan Modal Logout tanpa Alpine.js -->
<div id="sidebar-container">
    <!-- Sidebar -->
    <div id="sidebar"
         class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

        <!-- Header -->
        <div class="flex items-center justify-between h-20 bg-white px-4 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <img src="/images/logo-fitrah.png" alt="HMI Fitrah Logo" class="w-12 h-12 object-contain">
                <span class="text-2xl font-bold bg-gradient-to-r from-green-600 to-green-400 bg-clip-text text-transparent">
                    HMI FITRAH
                </span>
            </div>
            <button id="closeSidebar" class="lg:hidden p-2 text-gray-700 rounded-lg hover:bg-gray-100 transition">✖</button>
        </div>

        <!-- Navigation -->
        <nav class="mt-6">
            <a href="{{ route('dashboard') }}"
               class="flex items-center px-6 py-3 rounded-xl font-medium
               {{ request()->routeIs('dashboard') ? 'text-green-600 bg-green-50' : 'text-gray-600 hover:text-green-600 hover:bg-gray-50' }}">
                🏠 <span class="ml-3">Dashboard</span>
            </a>
            <a href="#"
               class="flex items-center px-6 py-3 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-xl font-medium transition">
                ✍️ <span class="ml-3">Pena Kader</span>
            </a>
            <a href="#"
               class="flex items-center px-6 py-3 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-xl font-medium transition">
                🎯 <span class="ml-3">Program Saya</span>
            </a>
            <a href="#"
               class="flex items-center px-6 py-3 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-xl font-medium transition">
                📅 <span class="ml-3">Kegiatan</span>
            </a>
            <a href="#"
               class="flex items-center px-6 py-3 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-xl font-medium transition">
                💬 <span class="ml-3">Diskusi</span>
            </a>

            <!-- Dropdown Pengaturan -->
            <div class="px-6">
                <button id="toggle-settings"
                        class="w-full flex items-center justify-between py-3 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-xl font-medium transition">
                    <span class="flex items-center">
                        ⚙️ <span class="ml-3">Pengaturan</span>
                    </span>
                    <svg id="settings-arrow" class="w-4 h-4 transition-transform" fill="none"
                         stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="settings-menu" class="mt-2 ml-6 space-y-1 hidden">
                    <a href="{{ route('profile.edit', Auth::id()) }}"
                       class="flex items-center px-4 py-2 rounded-lg transition
                       {{ request()->routeIs('profile.*') ? 'text-green-600 bg-green-50' : 'text-gray-600 hover:text-green-600 hover:bg-green-50' }}">
                        👤 <span class="ml-2">Profil</span>
                    </a>
                    <a href="#"
                       class="flex items-center px-4 py-2 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition">
                        🔒 <span class="ml-2">Keamanan</span>
                    </a>
                    <a href="#"
                       class="flex items-center px-4 py-2 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition">
                        🎨 <span class="ml-2">Preferensi</span>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Logout -->
        <div class="absolute bottom-4 left-0 right-0 px-4">
            <button id="logout-btn"
                    class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50 rounded-xl font-medium transition cursor-pointer">
                🚪 <span class="ml-3">Logout</span>
            </button>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Logout -->
<div id="logout-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div id="logout-modal-content" class="bg-white rounded-2xl shadow-xl p-6 w-80">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Konfirmasi Logout</h2>
        <p class="text-gray-600 mb-6">Apakah Anda yakin ingin logout?</p>
        <div class="flex justify-end space-x-3">
            <button id="logout-cancel"
                    class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium transition cursor-pointer">
                Batal
            </button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white font-medium transition cursor-pointer">
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Sidebar toggle
    const sidebar = document.getElementById('sidebar');
    document.getElementById('closeSidebar').addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
    });
    document.getElementById('openSidebar')?.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
    });

    // Dropdown Pengaturan toggle
    const toggleSettings = document.getElementById('toggle-settings');
    const settingsMenu = document.getElementById('settings-menu');
    const settingsArrow = document.getElementById('settings-arrow');

    toggleSettings.addEventListener('click', () => {
        settingsMenu.classList.toggle('hidden');
        settingsArrow.classList.toggle('rotate-180');
    });

    // Modal Logout
    const logoutBtn = document.getElementById('logout-btn');
    const logoutModal = document.getElementById('logout-modal');
    const logoutCancel = document.getElementById('logout-cancel');

    logoutBtn.addEventListener('click', () => {
        logoutModal.classList.remove('hidden');
    });

    logoutCancel.addEventListener('click', () => {
        logoutModal.classList.add('hidden');
    });

    // Close modal on clicking outside
    const logoutModalContent = document.getElementById('logout-modal-content');
    logoutModal.addEventListener('click', (e) => {
        if (!logoutModalContent.contains(e.target)) {
            logoutModal.classList.add('hidden');
        }
    });
</script>
