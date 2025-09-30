@extends('user.layouts.app')

@section('title', 'Pena Kader')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-green-50 via-white to-green-100 py-20 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-full blur-3xl animate-pulse-slow">
            </div>
            <div
                class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-secondary/20 to-primary/20 rounded-full blur-3xl animate-bounce-slow">
            </div>
            <div class="absolute top-20 left-20 text-4xl animate-bounce">✍️</div>
            <div class="absolute top-40 right-32 text-3xl animate-wiggle">📝</div>
            <div class="absolute bottom-32 left-32 text-3xl animate-pulse">💡</div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="font-heading font-bold text-4xl lg:text-6xl text-dark text-balance leading-tight mb-6">
                    <span class="gradient-text">Pena Kader <br></span> HMI Komisariat Fitrah ✍️
                </h1>
                <p class="text-lg text-gray-600 text-pretty max-w-3xl mx-auto leading-relaxed">
                    Tempat kader-kader HMI Komisariat Fitrah berbagi pemikiran, pengalaman, dan inspirasi melalui tulisan
                    yang
                    bermakna dan mencerahkan! 🌟
                </p>
            </div>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Categories -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                {{-- Tombol Semua --}}
                <a href="{{ route('pena-kader.index') }}"
                    class="px-6 py-3 rounded-2xl font-bold transition-all duration-300
        {{ !request('category') ? 'bg-primary text-white shadow-md' : 'bg-white text-primary border-2 border-primary' }}">
                    Semua
                </a>

                {{-- Loop kategori --}}
                @foreach ($categories as $category)
                    <a href="{{ route('pena-kader.index', ['category' => $category->slug]) }}"
                        class="px-6 py-3 rounded-2xl font-bold transition-all duration-300
            {{ request('category') == $category->slug
                ? 'bg-primary text-white shadow-md'
                : 'bg-white text-primary border-2 border-primary' }}">
                        {{ $category->nama }}
                    </a>
                @endforeach
            </div>



            <!-- Blog Posts Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($recentPosts as $post)
                    <a href="{{ route('pena-kader.show', $post->slug) }}" class="block">
                        <article
                            class="bg-gradient-to-br from-accent to-white rounded-3xl overflow-hidden card-hover shadow-lg border border-green-100 transition-transform transform hover:-translate-y-1 hover:shadow-2xl">

                            <!-- Thumbnail -->
                            <div class="aspect-video relative overflow-hidden">
                                <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : '/images/logo-fitrah.png' }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover transition-transform duration-300">
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                    <span class="text-lg">📅</span>
                                    {{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}
                                </div>
                                <h3 class="font-heading font-bold text-xl text-dark mb-3 line-clamp-2">
                                    {{ $post->title }}
                                </h3>

                                <p class="text-gray-600 mb-4">
                                    {{ Str::limit(strip_tags($post->content), 120) }}
                                </p>
                                <span
                                    class="text-primary font-bold flex items-center gap-2 hover:text-secondary transition-colors">
                                    Baca Selengkapnya <span>→</span>
                                </span>
                            </div>
                        </article>
                    </a>
                @endforeach
            </div>

            <div class="flex justify-center mt-12">
                <div class="flex items-center space-x-2">
                    @php
                        $total = $recentPosts->lastPage();
                        $current = $recentPosts->currentPage();
                        $start = max(1, $current - 2);
                        $end = min($total, $current + 2);
                    @endphp

                    @if ($start > 1)
                        <a href="{{ $recentPosts->url(1) }}" class="px-4 py-2 bg-gray-200 text-gray-600 rounded-xl">1</a>
                        @if ($start > 2)
                            <span class="px-2">...</span>
                        @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        @if ($i == $current)
                            <button
                                class="px-4 py-2 bg-primary text-white rounded-xl font-bold">{{ $i }}</button>
                        @else
                            <a href="{{ $recentPosts->url($i) }}"
                                class="px-4 py-2 bg-gray-200 text-gray-600 rounded-xl hover:bg-gray-300 transition-colors">{{ $i }}</a>
                        @endif
                    @endfor

                    @if ($end < $total)
                        @if ($end < $total - 1)
                            <span class="px-2">...</span>
                        @endif
                        <a href="{{ $recentPosts->url($total) }}"
                            class="px-4 py-2 bg-gray-200 text-gray-600 rounded-xl">{{ $total }}</a>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection
