@extends('user.layouts.app')

@section('title', 'Ketua Umum')

@section('content')
    <section class="relative bg-gradient-to-br from-green-50 via-white to-green-100 py-20 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-full blur-3xl animate-pulse-slow">
            </div>
            <div
                class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-secondary/20 to-primary/20 rounded-full blur-3xl animate-bounce-slow">
            </div>
            <div class="absolute top-20 left-20 text-4xl animate-bounce">👑</div>
            <div class="absolute top-40 right-32 text-3xl animate-wiggle">📜</div>
            <div class="absolute bottom-32 left-32 text-3xl animate-pulse">⭐</div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="font-heading font-bold text-4xl lg:text-6xl text-dark text-balance leading-tight mb-6">
                    <span class="gradient-text">Jejak Kepemimpinan</span> <br> HMI Komisariat Fitrah 🎓
                </h1>
                <p class="text-lg text-gray-600 text-pretty max-w-3xl mx-auto leading-relaxed">
                    Mengenal para pemimpin yang telah mendedikasikan diri untuk memajukan HMI Komisariat Fitrah dari masa ke masa. Inilah para Ketua Umum yang telah mengukir sejarah.
                </p>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-dark mb-12">Galeri Ketua Umum</h2>

            @if($ketuaUmums->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Loop melalui data ketua umum --}}
                @foreach ($ketuaUmums as $ketua)
                    <article
                        class="bg-gradient-to-br from-accent to-white rounded-3xl overflow-hidden card-hover shadow-lg border border-green-100 transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col">

                        <div class="aspect-[4/5] relative overflow-hidden">
                            <img src="{{ $ketua->foto ? asset('storage/' . $ketua->foto) : '/images/default-avatar.png' }}"
                                alt="Foto {{ $ketua->nama }}"
                                class="w-full h-full object-cover object-top transition-transform duration-300">
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <span class="block text-sm font-semibold text-primary mb-2">
                                PERIODE {{ $ketua->periode ?? 'N/A' }}
                            </span>
                            <h3 class="font-heading font-bold text-2xl text-dark mb-3">
                                {{ $ketua->nama }}
                            </h3>
                            <div class="mt-auto space-y-2 text-gray-600">
                                <p class="flex items-center gap-2">
                                    <span class="text-lg">🎓</span>
                                    <span>{{ $ketua->fakultas ?? 'Fakultas tidak diketahui' }}</span>
                                </p>
                                <p class="flex items-center gap-2">
                                    <span class="text-lg">📚</span>
                                    <span>{{ $ketua->prodi ?? 'Prodi tidak diketahui' }}</span>
                                </p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            @else
            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">Data Ketua Umum belum tersedia.</p>
            </div>
            @endif


            <div class="flex justify-center mt-16">
                <div class="flex items-center space-x-2">
                    @php
                        // Pastikan variabel $ketuaUmums ada dan merupakan instance Paginator
                        if (isset($ketuaUmums) && $ketuaUmums instanceof \Illuminate\Pagination\LengthAwarePaginator) {
                            $total = $ketuaUmums->lastPage();
                            $current = $ketuaUmums->currentPage();
                            $start = max(1, $current - 2);
                            $end = min($total, $current + 2);
                        } else {
                            $total = 0;
                        }
                    @endphp

                    @if ($total > 1)
                        @if ($start > 1)
                            <a href="{{ $ketuaUmums->url(1) }}" class="px-4 py-2 bg-gray-200 text-gray-600 rounded-xl">1</a>
                            @if ($start > 2)
                                <span class="px-2">...</span>
                            @endif
                        @endif

                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $current)
                                <button
                                    class="px-4 py-2 bg-primary text-white rounded-xl font-bold">{{ $i }}</button>
                            @else
                                <a href="{{ $ketuaUmums->url($i) }}"
                                    class="px-4 py-2 bg-gray-200 text-gray-600 rounded-xl hover:bg-gray-300 transition-colors">{{ $i }}</a>
                            @endif
                        @endfor

                        @if ($end < $total)
                            @if ($end < $total - 1)
                                <span class="px-2">...</span>
                            @endif
                            <a href="{{ $ketuaUmums->url($total) }}"
                                class="px-4 py-2 bg-gray-200 text-gray-600 rounded-xl">{{ $total }}</a>
                        @endif
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection
