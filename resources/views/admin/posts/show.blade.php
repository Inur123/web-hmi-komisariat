@extends('admin.layouts.app')

@section('title', 'Detail Post')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white/80 rounded-3xl shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detail Post</h2>
        <a href="{{ route('posts.index') }}" class="bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-2xl">Kembali</a>
    </div>

    <!-- Thumbnail -->
    <div class="mb-4">
        <label class="font-bold text-gray-800">Thumbnail:</label>
        <div class="mt-2">
            @if ($post->thumbnail)
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                     class="w-48 h-48 object-cover rounded-md shadow">
            @else
                <div class="w-48 h-48 bg-gray-200 flex items-center justify-center rounded-md text-gray-600 font-bold">
                    No Image
                </div>
            @endif
        </div>
    </div>

    <!-- Judul -->
    <div class="mb-2">
        <label class="font-bold text-gray-800">Judul:</label>
        <p class="mt-1 text-gray-700">{{ $post->title }}</p>
    </div>

    <!-- Penulis -->
    <div class="mb-2">
        <label class="font-bold text-gray-800">Penulis:</label>
        <p class="mt-1 text-gray-700">{{ $post->penulis->nama ?? '-' }}</p>
    </div>

    <!-- Kategori -->
    <div class="mb-2">
        <label class="font-bold text-gray-800">Kategori:</label>
        <p class="mt-1 text-gray-700">{{ $post->category->nama ?? '-' }}</p>
    </div>

    <!-- Status -->
    <div class="mb-2">
        <label class="font-bold text-gray-800">Status:</label>
        <p class="mt-1 text-gray-700">{{ ucfirst($post->status) }}</p>
    </div>

    <!-- Tanggal Publish -->
    <div class="mb-2">
        <label class="font-bold text-gray-800">Tanggal Publish:</label>
        <p class="mt-1 text-gray-700">{{ $post->published_at ?? '-' }}</p>
    </div>

    <!-- Tags -->
    <div class="mb-2">
        <label class="font-bold text-gray-800">Tags:</label>
        <p class="mt-1 text-gray-700">
            @foreach ($post->tags as $tag)
                <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs mr-1">{{ $tag->name }}</span>
            @endforeach
        </p>
    </div>

    <!-- Konten -->
    <div class="mb-2">
        <label class="font-bold text-gray-800">Konten:</label>
        <div class="mt-2 p-4 border border-gray-200 rounded-lg bg-gray-50 prose max-w-full">
            {!! $post->content !!}
        </div>
    </div>

    <!-- Additional Images -->
    @if($post->images->count() > 0)
    <div class="mb-2">
        <label class="font-bold text-gray-800">Gambar Tambahan:</label>
        <div class="mt-2 flex flex-wrap gap-4">
            @foreach($post->images as $img)
                <img src="{{ asset('storage/' . $img->image) }}" class="w-32 h-32 object-cover rounded-md border">
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
