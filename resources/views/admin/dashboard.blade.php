@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
  <!-- Welcome Section -->
  <div class="bg-gradient-to-r from-green-600 to-green-400 rounded-3xl p-8 text-white mb-8 relative overflow-hidden">
    <div class="absolute top-4 right-4 text-4xl animate-bounce">👋</div>
    <h2 class="font-[Poppins] font-bold text-3xl mb-2">Selamat Datang Kembali!</h2>
    <p class="text-green-100 text-lg">Semangat pagi! Ada banyak hal seru yang bisa kamu lakukan hari ini 🚀</p>
    <div class="mt-6 flex flex-wrap gap-4">
      <button class="bg-white/20 backdrop-blur-sm px-6 py-3 rounded-2xl hover:bg-white/30 transition">📝 Tulis Artikel Baru</button>
      <button class="bg-white/20 backdrop-blur-sm px-6 py-3 rounded-2xl hover:bg-white/30 transition">👥 Lihat Kegiatan</button>
    </div>
  </div>

  <!-- Cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-3xl p-6 shadow hover:shadow-lg transition hover:-translate-y-1 border border-green-100">
      <p class="text-gray-500 text-sm">Artikel Ditulis</p>
      <p class="text-3xl font-bold text-gray-800">12</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow hover:shadow-lg transition hover:-translate-y-1 border border-green-100">
      <p class="text-gray-500 text-sm">Kegiatan Diikuti</p>
      <p class="text-3xl font-bold text-gray-800">8</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow hover:shadow-lg transition hover:-translate-y-1 border border-green-100">
      <p class="text-gray-500 text-sm">Poin Kontribusi</p>
      <p class="text-3xl font-bold text-gray-800">245</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow hover:shadow-lg transition hover:-translate-y-1 border border-green-100">
      <p class="text-gray-500 text-sm">Ranking</p>
      <p class="text-3xl font-bold text-gray-800">#3</p>
    </div>
  </div>
@endsection
