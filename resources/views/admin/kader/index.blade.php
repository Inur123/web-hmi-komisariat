@extends('admin.layouts.app')

@section('title', 'Data Kader')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white/80 rounded-3xl shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Kader</h2>
        <a href="{{ route('kader.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-2xl shadow-md transition-all">
            + Tambah Kader
        </a>
    </div>

    <!-- Filter -->
    <form method="GET" action="{{ route('kader.index') }}" class="mb-4 flex flex-wrap gap-4 items-end">
        <div>
            <label class="block font-semibold mb-1">Periode</label>
            <select name="periode_id" class="px-4 py-2 border rounded-2xl focus:outline-none">
                <option value="">-- Semua Periode --</option>
                @foreach($periodes as $periode)
                    <option value="{{ $periode->id }}" {{ request('periode_id') == $periode->id ? 'selected' : '' }}>
                        {{ $periode->nama_periode }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold mb-1">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="px-4 py-2 border rounded-2xl focus:outline-none">
                <option value="">-- Semua Jenis Kelamin --</option>
                <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-2xl">
                Filter
            </button>
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-xl">
            <thead class="bg-green-50">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Foto</th>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Jenis Kelamin</th>
                    <th class="p-3 text-left">No HP</th>
                    <th class="p-3 text-left">Fakultas</th>
                    <th class="p-3 text-left">Prodi</th>
                    <th class="p-3 text-left">Hobi</th>
                    <th class="p-3 text-left">Periode</th>
                    <th class="p-3 text-left">Jabatan</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = ($kaders->currentPage() - 1) * $kaders->perPage() + 1;
                @endphp
                @forelse($kaders as $kader)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">{{ $no++ }}</td>
                    <td class="p-3">
                        @if ($kader->foto)
                            <img src="{{ asset('storage/' . $kader->foto) }}" alt="{{ $kader->nama }}"
                                 class="w-12 h-12 rounded-full object-cover">
                        @else
                            <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-400 rounded-full flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr($kader->nama,0,2)) }}
                            </div>
                        @endif
                    </td>
                    <td class="p-3">{{ $kader->nama }}</td>
                    <td class="p-3">{{ $kader->jenis_kelamin }}</td>
                    <td class="p-3">{{ $kader->nohp ?? '-' }}</td>
                    <td class="p-3">{{ $kader->fakultas ?? '-' }}</td>
                    <td class="p-3">{{ $kader->prodi ?? '-' }}</td>
                    <td class="p-3">{{ $kader->hobi ?? '-' }}</td>
                    <td class="p-3">{{ $kader->periode->nama_periode ?? '-' }}</td>
                    <td class="p-3">{{ $kader->jabatan ?? '-' }}</td>
                    <td class="p-3 text-center space-x-1">
                        <a href="{{ route('kader.edit', $kader->id) }}"
                           class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('kader.destroy', $kader->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus kader ini?')"
                                    class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="p-4 text-center text-gray-500">Belum ada data kader</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="bg-green-50 font-bold">
                    <td colspan="11" class="p-3 text-right">Total Kader: {{ $kaders->total() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mt-4 flex justify-between items-center">
        <p class="text-gray-500">Halaman {{ $kaders->currentPage() }} dari {{ $kaders->lastPage() }}</p>
        <div class="flex space-x-2">
            @if ($kaders->onFirstPage())
                <span class="px-3 py-1 bg-gray-200 rounded">«</span>
            @else
                <a href="{{ $kaders->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">«</a>
            @endif

            @foreach ($kaders->getUrlRange(1, $kaders->lastPage()) as $page => $url)
                @if ($page == $kaders->currentPage())
                    <span class="px-3 py-1 bg-green-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">{{ $page }}</a>
                @endif
            @endforeach

            @if ($kaders->hasMorePages())
                <a href="{{ $kaders->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">»</a>
            @else
                <span class="px-3 py-1 bg-gray-200 rounded">»</span>
            @endif
        </div>
    </div>
</div>
@endsection
