<header class="h-20 bg-white shadow px-6 flex items-center justify-between sticky top-0 z-40">
    <button id="openSidebar" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition">☰</button>
    <h1 class="text-2xl font-bold font-[Poppins]">
        Dashboard <span class="bg-gradient-to-r from-green-600 to-green-400 bg-clip-text text-transparent">Admin</span>
        🎉
    </h1>
    <div class="flex items-center gap-4">
        <button class="relative p-2 rounded-xl hover:bg-gray-100">
            🔔
            <span
                class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
        </button>
        <div class="flex items-center gap-3">
            @php
                $user = Auth::user();
                $name = $user->name ?? 'User';
                // ambil kata-kata dalam nama
                $words = explode(' ', trim($name));
                // ambil huruf depan dari max 2 kata pertama
                $initials = strtoupper(substr($words[0] ?? '', 0, 1) . substr($words[1] ?? end($words), 0, 1));
            @endphp

            <div
                class="w-10 h-10 bg-gradient-to-br from-green-600 to-green-400 rounded-xl flex items-center justify-center text-white font-bold">
                {{ $initials }}
            </div>
            <div class="hidden md:block">
                <p class="font-medium text-gray-800">{{ $name }}</p>
                <p class="text-sm text-gray-500">Administrator</p>
            </div>
        </div>

    </div>
</header>
