<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - HMI Cabang Ponorogo Komisariat Fitrah</title>

    <link rel="icon" href="{{ asset('images/logo-fitrah.webp') }}" type="image/x-icon">
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet" />
</head>

<body
    class="font-[Inter] bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- Container -->
    <div class="w-full max-w-md mx-auto p-6 relative z-10">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 mx-auto mb-4 bg-white rounded-3xl shadow-lg flex items-center justify-center">
                <img src="{{ asset('images/logo-fitrah.webp') }}" alt="HMI Fitrah Logo" class="w-16 h-16 object-contain" />
            </div>
            <h1 class="font-[Poppins] font-bold text-3xl text-gray-800 mb-2">
                Daftar
                <span class="bg-gradient-to-r from-green-600 to-green-400 bg-clip-text text-transparent">Akun</span> Baru ✨
            </h1>
            <p class="text-gray-600">Isi data kamu untuk mulai gabung dashboard</p>
        </div>

        <!-- Form -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-xl p-8 border border-green-100">
            <form method="POST" action="{{ route('register.process') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="text-sm font-bold text-gray-800 mb-2 flex items-center gap-2">
                        👤 Nama Lengkap
                    </label>
                    <input type="text" id="name" name="name" placeholder="Nama kamu"
                        class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:ring-2 focus:ring-green-600 focus:border-transparent bg-white/70 transition-all duration-300 hover:border-green-600"
                        required />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="text-sm font-bold text-gray-800 mb-2 flex items-center gap-2">
                        📧 Email
                    </label>
                    <input type="email" id="email" name="email" placeholder="email@example.com"
                        class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:ring-2 focus:ring-green-600 focus:border-transparent bg-white/70 transition-all duration-300 hover:border-green-600"
                        required />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="text-sm font-bold text-gray-800 mb-2 flex items-center gap-2">
                        🔒 Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="Minimal 8 karakter"
                        class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:ring-2 focus:ring-green-600 focus:border-transparent bg-white/70 transition-all duration-300 hover:border-green-600"
                        required />
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="text-sm font-bold text-gray-800 mb-2 flex items-center gap-2">
                        ✅ Konfirmasi Password
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password"
                        class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:ring-2 focus:ring-green-600 focus:border-transparent bg-white/70 transition-all duration-300 hover:border-green-600"
                        required />
                </div>

                <button type="submit" id="registerButton"
                    class="w-full bg-gradient-to-r from-green-600 to-green-500 text-white py-4 px-6 rounded-2xl font-bold hover:shadow-xl hover:scale-105 transition-all duration-300 shadow-[0_0_20px_rgba(34,197,94,0.5)] text-lg flex items-center justify-center gap-2">
                    🚀 Daftar Sekarang
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('login') }}"
                    class="text-gray-500 hover:text-green-600 transition-colors flex items-center justify-center gap-2">
                    Sudah punya akun? <span class="font-bold">Login di sini</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
