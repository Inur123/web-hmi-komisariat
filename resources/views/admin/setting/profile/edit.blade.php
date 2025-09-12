@extends('admin.layouts.app')

@section('title', 'Edit Profil')

@section('content')
    <div class="max-w-5xl mx-auto bg-white/80 backdrop-blur-md rounded-3xl shadow-xl p-8 border border-green-100">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Kolom Kiri: Profil Info -->
            <div class="flex flex-col items-center text-center">
                @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profil"
                        class="w-40 h-40 rounded-full object-cover border-4 border-green-200 shadow-lg mb-4">
                @else
                    <div
                        class="w-40 h-40 flex items-center justify-center rounded-full bg-green-100 text-green-600 text-6xl font-bold border-4 border-green-200 shadow-lg mb-4">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif

                <h2 class="font-[Poppins] font-bold text-2xl text-gray-800">{{ $user->name }}</h2>
                <p class="text-gray-500">{{ $user->email }}</p>

                <div class="mt-6 w-full space-y-3 text-left">
                    <div class="p-4 bg-green-50 rounded-xl shadow-sm">
                        <p class="text-sm text-gray-500">Nama Lengkap</p>
                        <p class="font-semibold text-gray-800">{{ $user->name }}</p>
                    </div>
                    <div class="p-4 bg-green-50 rounded-xl shadow-sm">
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="font-semibold text-gray-800">{{ $user->email }}</p>
                    </div>

                </div>
            </div>

            <!-- Kolom Kanan: Form Edit -->
            <div>
                <h2 class="font-[Poppins] font-bold text-xl mb-6 text-gray-800">Edit Data Profil</h2>

                <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Foto -->
                    <div>
                        <label class="block font-bold text-gray-800 mb-2">Foto Profil</label>
                        <input type="file" name="photo"
                            class="w-full px-4 py-3 border border-green-200 rounded-2xl
                                  focus:ring-2 focus:ring-green-600 focus:border-transparent
                                  focus:outline-none transition-all duration-300
                                  hover:border-green-600 bg-white/70">
                        @error('photo')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama -->
                    <div>
                        <label class="block font-bold text-gray-800 mb-2">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full px-4 py-3 border border-green-200 rounded-2xl
                                  focus:ring-2 focus:ring-green-600 focus:border-transparent
                                  focus:outline-none transition-all duration-300
                                  hover:border-green-600 bg-white/70">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block font-bold text-gray-800 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full px-4 py-3 border border-green-200 rounded-2xl
                                  focus:ring-2 focus:ring-green-600 focus:border-transparent
                                  focus:outline-none transition-all duration-300
                                  hover:border-green-600 bg-white/70">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                <!-- Password Baru -->
<div class="relative w-full max-w-md">
    <label class="block font-bold text-gray-800 mb-2">Password Baru</label>
    <div class="relative">
        <input type="password" id="password" name="password"
            class="w-full px-4 py-3 pr-12 border border-green-200 rounded-2xl
                   focus:ring-2 focus:ring-green-600 focus:border-transparent
                   focus:outline-none transition-all duration-300
                   hover:border-green-600 bg-white/70"
            placeholder="Kosongkan jika tidak ingin mengubah password">
        <button type="button" onclick="togglePassword('password', 'eyePassword')"
            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-green-600">
            <i id="eyePassword" class="fas fa-eye"></i>
        </button>
    </div>
</div>

<!-- Konfirmasi Password Baru -->
<div class="relative w-full max-w-md mt-4">
    <label class="block font-bold text-gray-800 mb-2">Konfirmasi Password Baru</label>
    <div class="relative">
        <input type="password" id="password_confirmation" name="password_confirmation"
            class="w-full px-4 py-3 pr-12 border border-green-200 rounded-2xl
                   focus:ring-2 focus:ring-green-600 focus:border-transparent
                   focus:outline-none transition-all duration-300
                   hover:border-green-600 bg-white/70"
            placeholder="Ulangi password baru">
        <button type="button" onclick="togglePassword('password_confirmation', 'eyeConfirm')"
            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-green-600">
            <i id="eyeConfirm" class="fas fa-eye"></i>
        </button>
    </div>
</div>


                    <div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-green-600 to-green-500 text-white
                                   py-4 px-6 rounded-2xl font-bold hover:shadow-xl hover:scale-105
                                   transition-all duration-300 shadow-[0_0_20px_rgba(34,197,94,0.5)]
                                   text-lg flex items-center justify-center gap-2">
                            💾 Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
@endsection
