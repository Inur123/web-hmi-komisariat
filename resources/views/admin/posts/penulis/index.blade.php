@extends('admin.layouts.app')

@section('title', 'Data Penulis')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white/80 rounded-3xl shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Penulis</h2>
        <a href="{{ route('penulis.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-2xl shadow-md transition-all">
            + Tambah Penulis
        </a>
    </div>
<div class="overflow-x-auto">
    <table class="w-full border border-gray-200 rounded-xl min-w-[520px] md:min-w-0">
        <thead class="bg-green-50">
            <tr>
                <th class="p-3 text-left">No</th>

                {{-- kolom lain disembunyikan di mobile --}}
                <th class="p-3 text-left hidden md:table-cell">Foto</th>
                <th class="p-3 text-left hidden md:table-cell">Nama</th>
                <th class="p-3 text-left hidden md:table-cell">Jabatan</th>
                <th class="p-3 text-left hidden md:table-cell">Deskripsi</th>

                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @php
                $no = ($penulis->currentPage() - 1) * $penulis->perPage() + 1;
            @endphp

            @forelse($penulis as $item)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">{{ $no++ }}</td>

                    {{-- kolom lain disembunyikan di mobile --}}
                    <td class="p-3 hidden md:table-cell">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                 class="w-12 h-12 rounded-full object-cover">
                        @else
                            <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-400 rounded-full flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr($item->nama,0,2)) }}
                            </div>
                        @endif
                    </td>

                    <td class="p-3 hidden md:table-cell">{{ $item->nama }}</td>
                    <td class="p-3 hidden md:table-cell">{{ $item->jabatan }}</td>
                    <td class="p-3 hidden md:table-cell">{{ Str::limit($item->deskripsi, 50) }}</td>

                    {{-- Aksi: tetap tampil di mobile --}}
                    <td class="p-3 text-center">
                        <div class="inline-flex items-center gap-2">
                            <a href="{{ route('penulis.show', $item->id) }}"
                               class="w-9 h-9 grid place-items-center bg-gray-200 hover:bg-gray-300 rounded-lg text-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('penulis.edit', $item->id) }}"
                               class="w-9 h-9 grid place-items-center bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('penulis.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')"
                                        class="w-9 h-9 grid place-items-center bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500">Belum ada data penulis</td>
                </tr>
            @endforelse
        </tbody>

        <tfoot>
            <tr class="bg-green-50 font-bold">
                <td colspan="7" class="p-3 text-right">
                    Total Penulis: {{ $penulis->total() }}
                </td>
            </tr>
        </tfoot>
    </table>
</div>


    <div class="mt-4 flex justify-between items-center">
        <p class="text-gray-500">Halaman {{ $penulis->currentPage() }} dari {{ $penulis->lastPage() }}</p>
        <div class="flex space-x-2">
            @if ($penulis->onFirstPage())
                <span class="px-3 py-1 bg-gray-200 rounded">«</span>
            @else
                <a href="{{ $penulis->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">«</a>
            @endif

            @foreach ($penulis->getUrlRange(1, $penulis->lastPage()) as $page => $url)
                @if ($page == $penulis->currentPage())
                    <span class="px-3 py-1 bg-green-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">{{ $page }}</a>
                @endif
            @endforeach

            @if ($penulis->hasMorePages())
                <a href="{{ $penulis->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">»</a>
            @else
                <span class="px-3 py-1 bg-gray-200 rounded">»</span>
            @endif
        </div>
    </div>
</div>
@endsection
