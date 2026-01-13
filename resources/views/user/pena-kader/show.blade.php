@extends('user.layouts.app')

@section('title', 'Pena Kader - ' . $post->title)
@section('meta')
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 150) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    @if ($post->thumbnail)
        <meta property="og:image" content="{{ asset('storage/' . $post->thumbnail) }}">
    @else
        <meta property="og:image" content="{{ asset('images/logo-fitrah.webp') }}">
    @endif

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->content), 150) }}">
    @if ($post->thumbnail)
        <meta name="twitter:image" content="{{ asset('storage/' . $post->thumbnail) }}">
    @else
        <meta name="twitter:image" content="{{ asset('images/logo-fitrah.webp') }}">
    @endif
@endsection


@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Article Content -->
            <article class="lg:col-span-2">

                <!-- Article Header -->
                <header class="mb-12">
                    <div class="flex items-center gap-2 text-sm text-gray-600 mb-4">
                        <span
                            class="bg-primary text-white px-3 py-1 rounded-full font-bold">{{ $post->category->nama }}</span>
                        <span class="text-gray-400">•</span>
                        <span class="text-lg">📅</span>
                        {{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}

                    </div>

                    <h1 class="font-heading font-bold text-3xl lg:text-5xl text-dark text-balance leading-tight mb-6">
                        {{ $post->title }}
                    </h1>

                    <div class="flex items-center gap-3 mb-8">
                        @php
                            $name = $post->penulis->nama ?? 'Penulis Tidak Diketahui';
                            $photo = $post->penulis->foto ?? null;
                            $words = explode(' ', trim($name));
                            $initials = strtoupper(substr($words[0] ?? '', 0, 1) . substr($words[1] ?? '', 0, 1));
                        @endphp

                        @if ($photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="{{ $name }}"
                                class="w-12 h-12 rounded-full object-cover">
                        @else
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center text-white font-bold text-lg">
                                {{ $initials }}
                            </div>
                        @endif

                        <div>
                            <p class="font-bold text-dark">{{ $name }}</p>
                            <p class="text-sm text-gray-600">{{ $post->penulis->jabatan ?? 'Kader HMI Komisariat Fitrah Ponorogo' }}
                            </p>
                        </div>
                    </div>

                    @if ($post->thumbnail)
                        <div class="w-full rounded-3xl overflow-hidden mb-8 border border-green-100">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                class="w-full h-auto object-contain">
                        </div>
                    @endif

                </header>

                <!-- Article Body -->
                <div class="prose prose-lg max-w-none">
                    {!! $post->content !!}
                </div>

                <!-- Post Images Section (di bawah content) -->
                @if ($post->images->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-8">
                        @foreach ($post->images as $img)
                            <div class="rounded-xl overflow-hidden border border-green-100">
                                <img src="{{ asset('storage/' . $img->image) }}" alt="Gambar {{ $loop->iteration }}"
                                    class="w-full h-full object-cover">
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Article Footer -->
                <footer class="border-t border-gray-200 pt-8 mt-12">
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="text-sm text-gray-600">Tags:</span>
                        @foreach ($post->tags as $tag)
                            <span
                                class="bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-medium">#{{ $tag->name }}</span>
                        @endforeach
                    </div>

                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div class="flex items-center gap-4">
                            <span class="text-gray-600">Bagikan:</span>
                            <a href="https://wa.me/?text={{ rawurlencode(url('/pena-kader/' . $post->slug)) }}"
                                target="_blank"
                                class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center hover:scale-110 transition-all duration-300">
                                <i class="fab fa-whatsapp text-lg"></i>
                            </a>


                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span>👁️</span>
                            <span>{{ $post->views ?? 0 }} views</span>
                        </div>
                    </div>
                </footer>

            </article>


            <!-- Added sidebar with related content -->
            <aside class="lg:col-span-1 space-y-8">
                <!-- Author Info -->
                <div class="bg-gradient-to-br from-accent to-white p-6 rounded-3xl border border-green-100 sticky">
                    <div class="text-center mb-4">
                        @php
                            $name = $post->penulis->nama ?? 'Penulis Tidak Diketahui';
                            $photo = $post->penulis->foto ?? null;
                            $jabatan = $post->penulis->jabatan ?? 'Kader HMI Komisariat Fitrah Ponorogo';
                            $deskripsi =
                                $post->penulis->deskripsi ??
                                'Mahasiswa aktif yang passionate dalam dakwah digital dan pengembangan diri. Suka nulis tentang Islam, leadership, dan kehidupan kampus.';

                            $words = explode(' ', trim($name));
                            $initials = strtoupper(substr($words[0] ?? '', 0, 1) . substr($words[1] ?? '', 0, 1));
                        @endphp

                        <div
                            class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4
                    {{ $photo ? '' : 'bg-gradient-to-br from-primary to-secondary' }}">
                            @if ($photo)
                                <img src="{{ asset('storage/' . $photo) }}" alt="{{ $name }}"
                                    class="w-20 h-20 rounded-full object-cover">
                            @else
                                <span class="text-white font-bold text-2xl">{{ $initials }}</span>
                            @endif
                        </div>

                        <h3 class="font-heading font-bold text-lg text-dark">{{ $name }}</h3>
                        <p class="text-sm text-gray-600 mb-4">{{ $jabatan }}</p>
                        <p class="text-sm text-gray-700 leading-relaxed">{{ $deskripsi }}</p>
                    </div>
                </div>


                <!-- Popular Posts -->
                <div class="bg-white p-6 rounded-3xl border border-green-100 shadow-sm">
                    <h3 class="font-heading font-bold text-lg text-dark mb-6 flex items-center gap-2">
                        🔥 Artikel Populer
                    </h3>
                    <div class="space-y-4">
                        @foreach ($popularPosts as $popular)
                            <article class="flex gap-3 group cursor-pointer">
                                <a href="{{ route('pena-kader.show', $popular->slug) }}" class="flex gap-3 w-full">
                                    <div class="w-16 h-16 rounded-2xl flex-shrink-0 overflow-hidden">
                                        @if ($popular->thumbnail)
                                            <img src="{{ asset('storage/' . $popular->thumbnail) }}"
                                                alt="{{ $popular->title }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <div
                                                class="w-full h-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                                <span class="text-2xl">📄</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="flex-1">
                                        <h4
                                            class="font-bold text-sm text-dark group-hover:text-primary transition-colors line-clamp-2">
                                            {{ $popular->title }}
                                        </h4>
                                        <p class="text-xs text-gray-600 mt-1">
                                            {{ $popular->published_at ? \Carbon\Carbon::parse($popular->published_at)->translatedFormat('d F Y') : '-' }}
                                        </p>

                                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                            <span>👁️ {{ number_format($popular->views) }}</span>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endforeach

                    </div>

                </div>

                <!-- Categories -->
                <div class="bg-white p-6 rounded-3xl border border-green-100 shadow-sm">
                    <h3 class="font-heading font-bold text-lg text-dark mb-4 flex items-center gap-2">
                        📂 Kategori
                    </h3>
                    <div class="space-y-2">
                        @foreach ($categories as $category)
                            <div class="flex items-center justify-between p-2 rounded-2xl bg-accent/5">
                                <div class="flex items-center gap-2">
                                    <span class="font-medium text-dark">{{ $category->nama }}</span>
                                </div>
                                <span class="text-sm text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">
                                    {{ $category->posts_count ?? 0 }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Tags Global -->
                <div class="bg-white p-6 rounded-3xl border border-green-100 shadow-sm">
                    <h3 class="font-heading font-bold text-lg text-dark mb-4 flex items-center gap-2">
                        🏷️ Tags
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($allTags as $tag)
                            <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-medium">
                                #{{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
