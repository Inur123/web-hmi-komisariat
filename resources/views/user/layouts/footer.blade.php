  <footer class="bg-gradient-to-br from-gray-900 to-black text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <img src="{{ asset('images/logo-fitrah.png') }}" alt="HMI Fitrah Logo"
                                class="w-full h-full object-contain" />
                        </div>
                        <div>
                            <h3 class="font-heading font-bold text-lg">HMI Komisariat Fitrah</h3>
                            <p class="text-sm text-gray-400">Ponorogo</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm">
                        HMI Komisariat Fitrah Ponorogo - Tempat berkembang bareng untuk generasi
                        muslim yang kece dan bermakna! 🌟
                    </p>
                </div>
                <div>
                    <h4 class="font-heading font-semibold text-lg mb-4">Menu</h4>
                   <ul class="space-y-2 text-sm">
                <li><a href="#beranda" class="text-gray-400 hover:text-white transition-colors">Beranda</a></li>
                <li><a href="#tentang" class="text-gray-400 hover:text-white transition-colors">Tentang</a></li>
                <li><a href="#program" class="text-gray-400 hover:text-white transition-colors">Program</a></li>
                <li><a href="#tokoh-hmi" class="text-gray-400 hover:text-white transition-colors">Tokoh HMI</a></li>
                <li><a href="{{ route('pena-kader.index') }}" class="text-gray-400 hover:text-white transition-colors">Pena Kader</a></li>
                <li><a href="#kontak" class="text-gray-400 hover:text-white transition-colors">Kontak</a></li>
            </ul>
                </div>
                <div>
                    <h4 class="font-heading font-semibold text-lg mb-4">Program</h4>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">Kajian
                                Rutin</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">Pelatihan
                                Kepemimpinan</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">Bakti
                                Sosial</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">Beasiswa</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-heading font-semibold text-lg mb-4">
                        Follow Kita! 📱
                    </h4>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-2xl flex items-center justify-center hover:scale-110 transition-all duration-300 shadow-lg">
                            <span class="text-lg">📘</span>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-2xl flex items-center justify-center hover:scale-110 transition-all duration-300 shadow-lg">
                            <span class="text-lg">📷</span>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-2xl flex items-center justify-center hover:scale-110 transition-all duration-300 shadow-lg">
                            <span class="text-lg">🐦</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                  &copy; {{ date('Y') }} HMI Komisariat Fitrah. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
