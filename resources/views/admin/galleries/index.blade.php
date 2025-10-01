@extends('admin.layouts.app')

@section('title', 'Data Gallery')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white/80 rounded-3xl shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Data Gallery</h2>
            <a href="{{ route('galleries.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-2xl shadow-md transition-all">
                + Tambah Gallery
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-xl">
                <thead class="bg-green-50">
                    <tr>
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Gambar</th>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">Deskripsi</th>
                        <th class="p-3 text-left">Tanggal</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = ($galleries->currentPage() - 1) * $galleries->perPage() + 1;
                    @endphp
                    @forelse($galleries as $gallery)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">{{ $no++ }}</td>
                            <td class="p-3">
                                @if ($gallery->thumbnail)
                                    <img src="{{ asset('storage/' . $gallery->thumbnail) }}"
                                        alt="Gambar {{ $gallery->nama }}" class="w-16 h-16 rounded-lg object-cover">
                                @else
                                    <div
                                        class="w-16 h-16 bg-gradient-to-br from-green-600 to-green-400 rounded-lg flex items-center justify-center text-white font-bold">
                                        N/A
                                    </div>
                                @endif
                            </td>
                            <td class="p-3 font-semibold">{{ $gallery->nama }}</td>
                            <td class="p-3 text-gray-600">{{ Str::limit($gallery->deskripsi, 50) }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($gallery->tanggal)->format('d M Y') }}</td>
                            <td class="p-3 text-center space-x-1">
                                <!-- Show -->
                                <a href="{{ route('galleries.show', $gallery->id) }}"
                                    class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white rounded text-sm">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Edit -->
                                <a href="{{ route('galleries.edit', $gallery->id) }}"
                                    class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus data ini?')"
                                        class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">Belum ada data gallery</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr class="bg-green-50 font-bold">
                        <td colspan="6" class="p-3 text-right">
                            Total Gallery: {{ $galleries->total() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="mt-4 flex justify-between items-center">
            <p class="text-gray-500">Halaman {{ $galleries->currentPage() }} dari {{ $galleries->lastPage() }}</p>
            <div class="flex space-x-2">
                @if ($galleries->onFirstPage())
                    <span class="px-3 py-1 bg-gray-200 rounded">«</span>
                @else
                    <a href="{{ $galleries->previousPageUrl() }}"
                        class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">«</a>
                @endif

                @foreach ($galleries->getUrlRange(1, $galleries->lastPage()) as $page => $url)
                    @if ($page == $galleries->currentPage())
                        <span class="px-3 py-1 bg-green-500 text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                            class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($galleries->hasMorePages())
                    <a href="{{ $galleries->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">»</a>
                @else
                    <span class="px-3 py-1 bg-gray-200 rounded">»</span>
                @endif
            </div>
        </div>
    </div>
@endsection
