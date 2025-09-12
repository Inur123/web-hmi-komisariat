@extends('admin.layouts.app')

@section('title', 'Data Category')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white/80 rounded-3xl shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Category</h2>
        <a href="{{ route('category.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-2xl shadow-md transition-all">
            + Tambah Category
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-xl">
            <thead class="bg-green-50">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Slug</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = ($categories->currentPage() - 1) * $categories->perPage() + 1;
                @endphp
                @forelse($categories as $category)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">{{ $no++ }}</td>
                    <td class="p-3">{{ $category->nama }}</td>
                    <td class="p-3">{{ $category->slug }}</td>
                    <td class="p-3 text-center space-x-1">
                        <!-- Edit -->
                        <a href="{{ route('category.edit', $category->id) }}" class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-sm">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">Belum ada data category</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="bg-green-50 font-bold">
                    <td colspan="4" class="p-3 text-right">
                        Total Category: {{ $categories->total() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex justify-between items-center">
        <p class="text-gray-500">Halaman {{ $categories->currentPage() }} dari {{ $categories->lastPage() }}</p>
        <div class="flex space-x-2">
            @if ($categories->onFirstPage())
                <span class="px-3 py-1 bg-gray-200 rounded">«</span>
            @else
                <a href="{{ $categories->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">«</a>
            @endif

            @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                @if ($page == $categories->currentPage())
                    <span class="px-3 py-1 bg-green-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">{{ $page }}</a>
                @endif
            @endforeach

            @if ($categories->hasMorePages())
                <a href="{{ $categories->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">»</a>
            @else
                <span class="px-3 py-1 bg-gray-200 rounded">»</span>
            @endif
        </div>
    </div>
</div>
@endsection
