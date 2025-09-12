<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $code ?? 'Error' }} - {{ $message ?? 'Terjadi Kesalahan' }}</title>
    <link rel="icon" href="{{ asset('images/logo-fitrah.png') }}" type="image/x-icon">
    @vite('resources/css/app.css', 'resources/js/app.js')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
</head>
<body class="font-[Inter] bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="w-full max-w-md mx-auto p-6 relative z-10">
        <div class="text-center mb-8">
            <div class="w-20 h-20 mx-auto mb-4 bg-white rounded-3xl shadow-lg flex items-center justify-center">
                <img src="{{ asset('images/logo-fitrah.png') }}" alt="HMI Fitrah Logo" class="w-16 h-16 object-contain" />
            </div>
            <h1 class="font-[Poppins] font-bold text-4xl text-gray-800 mb-2">
                {{ $code ?? 'Error' }}
            </h1>
            <p class="text-gray-600">{{ $message ?? 'Oops! Terjadi kesalahan.' }}</p>
        </div>
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-xl p-8 border border-green-100 text-center">
            <a href="{{ url('/') }}" class="w-full bg-gradient-to-r from-green-600 to-green-500 text-white py-4 px-6 rounded-2xl font-bold hover:shadow-xl hover:scale-105 transition-all duration-300 shadow-[0_0_20px_rgba(34,197,94,0.5)] text-lg flex items-center justify-center gap-2">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>
