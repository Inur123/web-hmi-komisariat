<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - HMI Cabang Ponorogo Komisariat Fitrah</title>

    <link rel="icon" href="{{ asset('images/logo-fitrah.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet" />
</head>

<body
    class="font-[Inter] bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen flex items-center justify-center relative overflow-hidden">
     @include('admin.layouts.notification')
    <!-- Background -->

    <!-- Container -->
    <div class="w-full max-w-md mx-auto p-6 relative z-10">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 mx-auto mb-4 bg-white rounded-3xl shadow-lg flex items-center justify-center">
                <img src="{{ asset('images/logo-fitrah.png') }}" alt="HMI Fitrah Logo" class="w-16 h-16 object-contain" />
            </div>
            <h1 class="font-[Poppins] font-bold text-3xl text-gray-800 mb-2">
                Halo
                <span class="bg-gradient-to-r from-green-600 to-green-400 bg-clip-text text-transparent">Kader</span>!
                👋
            </h1>
            <p class="text-gray-600">Login dulu yuk buat akses dashboard kamu</p>
        </div>

        <!-- Form -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-xl p-8 border border-green-100">
          <form id="loginForm" method="POST" action="{{ route('login.process') }}" class="space-y-6">
    @csrf
    <div>
        <label for="email" class="text-sm font-bold text-gray-800 mb-2 flex items-center gap-2">
            📧 Email Kamu
        </label>
        <input type="email" id="email" name="email" placeholder="email@example.com"
            class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all duration-300 hover:border-green-600 bg-white/70"
            required />
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password" class="text-sm font-bold text-gray-800 mb-2 flex items-center gap-2">
            🔒 Password
        </label>
        <input type="password" id="password" name="password" placeholder="Masukkan password kamu"
            class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:ring-2 focus:ring-green-600 focus:border-transparent transition-all focus:outline-none duration-300 hover:border-green-600 bg-white/70"
            required />
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" id="loginButton"
        class="w-full bg-gradient-to-r from-green-600 to-green-500 text-white py-4 px-6 rounded-2xl font-bold hover:shadow-xl hover:scale-105 transition-all duration-300 shadow-[0_0_20px_rgba(34,197,94,0.5)] text-lg flex items-center justify-center gap-2">
        🚀 Masuk Dashboard
    </button>
</form>

            <div class="mt-6 text-center">
                <a href="index.html"
                    class="text-gray-500 hover:text-green-600 transition-colors flex items-center justify-center gap-2">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

   <script>
    document.getElementById("loginForm").addEventListener("submit", function() {
        const button = document.getElementById("loginButton");
        button.disabled = true;
        button.innerHTML = `
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
            </svg>
            <span>Sedang masuk...</span>
        `;
    });
</script>
</body>

</html>
