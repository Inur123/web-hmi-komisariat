@extends('admin.layouts.app')

@section('title', 'Data Periode')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white/80 rounded-3xl shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Periode</h2>
        <a href="{{ route('periode.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-2xl shadow-md transition-all">
            + Tambah Periode
        </a>
    </div>



    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-xl">
            <thead class="bg-green-50">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Nama Periode</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = ($periodes->currentPage() - 1) * $periodes->perPage() + 1;
                @endphp
                @forelse($periodes as $periode)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">{{ $no++ }}</td>
                    <td class="p-3">{{ $periode->nama_periode }}</td>
                    <td class="p-3 text-center space-x-1">
                        <!-- Edit -->
                        <a href="{{ route('periode.edit', $periode->id) }}"
                           class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Delete -->
                        <form action="{{ route('periode.destroy', $periode->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus periode ini?')"
                                class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-500">Belum ada data periode</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="bg-green-50 font-bold">
                    <td colspan="3" class="p-3 text-right">
                        Total Periode: {{ $periodes->total() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mt-4 flex justify-between items-center">
        <p class="text-gray-500">Halaman {{ $periodes->currentPage() }} dari {{ $periodes->lastPage() }}</p>
        <div class="flex space-x-2">
            @if ($periodes->onFirstPage())
                <span class="px-3 py-1 bg-gray-200 rounded">«</span>
            @else
                <a href="{{ $periodes->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">«</a>
            @endif

            @foreach ($periodes->getUrlRange(1, $periodes->lastPage()) as $page => $url)
                @if ($page == $periodes->currentPage())
                    <span class="px-3 py-1 bg-green-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">{{ $page }}</a>
                @endif
            @endforeach

            @if ($periodes->hasMorePages())
                <a href="{{ $periodes->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">»</a>
            @else
                <span class="px-3 py-1 bg-gray-200 rounded">»</span>
            @endif
        </div>
    </div>
</div>
@endsection
