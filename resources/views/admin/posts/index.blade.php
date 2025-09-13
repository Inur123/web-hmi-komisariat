@extends('admin.layouts.app')

@section('title', 'Data Posts')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white/80 rounded-3xl shadow-lg">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 space-y-4 md:space-y-0">
        <h2 class="text-2xl font-bold text-gray-800">Data Posts</h2>
        <a href="{{ route('posts.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-2xl shadow-md transition-all text-center w-full md:w-auto">
            + Tambah Post
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-xl">
            <thead class="bg-green-50">
                <tr>
                    <th class="p-3 text-left text-sm">No</th>
                    <th class="p-3 text-left text-sm">Thumbnail</th>
                    <th class="p-3 text-left text-sm">Judul</th>
                    <th class="p-3 text-left text-sm">Penulis</th>
                    <th class="p-3 text-left text-sm">Kategori</th>
                    <th class="p-3 text-left text-sm">Status</th>
                    <th class="p-3 text-center text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = ($posts->currentPage() - 1) * $posts->perPage() + 1;
                @endphp
                @forelse($posts as $post)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3 text-sm">{{ $no++ }}</td>
                        <td class="p-3">
                            @if ($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                     class="w-12 h-12 rounded-lg object-cover">
                            @else
                                <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-400 rounded-lg flex items-center justify-center text-white font-bold text-xs">
                                    {{ strtoupper(substr($post->title,0,2)) }}
                                </div>
                            @endif
                        </td>
                        <td class="p-3 text-sm">{{ $post->title }}</td>
                        <td class="p-3 text-sm">{{ $post->penulis->nama ?? '-' }}</td>
                        <td class="p-3 text-sm">{{ $post->category->nama ?? '-' }}</td>
                        <td class="p-3 text-sm">{{ ucfirst($post->status) }}</td>
                        <td class="p-3 text-center space-x-1 flex flex-wrap justify-center gap-1">
                            <!-- Tombol Show -->
                            <a href="{{ route('posts.show', $post->id) }}"
                               class="px-2 py-1 bg-gray-500 hover:bg-gray-600 text-white rounded text-xs md:text-sm flex items-center justify-center">
                                <i class="fas fa-eye mr-1"></i> Lihat
                            </a>
                            <!-- Tombol Edit -->
                            <a href="{{ route('posts.edit', $post->id) }}"
                               class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-xs md:text-sm flex items-center justify-center">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus post ini?')"
                                        class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-xs md:text-sm flex items-center justify-center">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center text-gray-500 text-sm">Belum ada data post</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="bg-green-50 font-bold">
                    <td colspan="7" class="p-3 text-right text-sm">
                        Total Posts: {{ $posts->total() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex flex-col md:flex-row justify-between items-center space-y-2 md:space-y-0">
        <p class="text-gray-500 text-sm">Halaman {{ $posts->currentPage() }} dari {{ $posts->lastPage() }}</p>
        <div class="flex flex-wrap space-x-1">
            @if ($posts->onFirstPage())
                <span class="px-3 py-1 bg-gray-200 rounded text-sm">«</span>
            @else
                <a href="{{ $posts->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 text-sm">«</a>
            @endif

            @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                @if ($page == $posts->currentPage())
                    <span class="px-3 py-1 bg-green-500 text-white rounded text-sm">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 text-sm">{{ $page }}</a>
                @endif
            @endforeach

            @if ($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 text-sm">»</a>
            @else
                <span class="px-3 py-1 bg-gray-200 rounded text-sm">»</span>
            @endif
        </div>
    </div>
</div>
@endsection
