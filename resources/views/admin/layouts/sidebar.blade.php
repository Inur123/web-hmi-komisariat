<div id="sidebar"
  class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

  <div class="flex items-center justify-between h-20 bg-white px-4 border-b border-gray-200">
    <div class="flex items-center space-x-3">
      <img src="/images/logo-fitrah.png" alt="HMI Fitrah Logo" class="w-12 h-12 object-contain">
      <span class="text-2xl font-bold bg-gradient-to-r from-green-600 to-green-400 bg-clip-text text-transparent">
        HMI FITRAH
      </span>
    </div>
    <button id="closeSidebar" class="lg:hidden p-2 text-gray-700 rounded-lg hover:bg-gray-100 transition">✖</button>
  </div>

  <nav class="mt-6">
    <a href="#" class="flex items-center px-6 py-3 text-green-600 bg-green-50 rounded-xl font-medium">
      🏠 <span class="ml-3">Dashboard</span>
    </a>
    <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-xl font-medium transition">
      👤 <span class="ml-3">Profil Saya</span>
    </a>
    <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-xl font-medium transition">
      ✍️ <span class="ml-3">Pena Kader</span>
    </a>
    <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-xl font-medium transition">
      🎯 <span class="ml-3">Program Saya</span>
    </a>
    <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-xl font-medium transition">
      📅 <span class="ml-3">Kegiatan</span>
    </a>
    <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-xl font-medium transition">
      💬 <span class="ml-3">Diskusi</span>
    </a>
    <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-xl font-medium transition">
      ⚙️ <span class="ml-3">Pengaturan</span>
    </a>
  </nav>

  <div class="absolute bottom-4 left-0 right-0 px-4">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit"
        class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50 rounded-xl font-medium transition">
        🚪 <span class="ml-3">Logout</span>
      </button>
    </form>
  </div>
</div>
