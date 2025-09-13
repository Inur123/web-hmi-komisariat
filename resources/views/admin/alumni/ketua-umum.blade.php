@extends('admin.layouts.app')

@section('title', 'Data Ketua Umum')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white/80 rounded-3xl shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">👑 Data Ketua Umum</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-xl">
                <thead class="bg-green-50">
                    <tr>
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Foto</th>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">Jenis Kelamin</th>
                        <th class="p-3 text-left">Fakultas</th>
                        <th class="p-3 text-left">Prodi</th>
                        <th class="p-3 text-left">Periode</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = ($ketuaUmum->currentPage() - 1) * $ketuaUmum->perPage() + 1;
                    @endphp
                    @forelse($ketuaUmum as $alumni)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">{{ $no++ }}</td>
                            <td class="p-3">
                                @php
                                    $name = $alumni->nama ?? 'Alumni';
                                    $photo = $alumni->foto ?? null;

                                    $words = explode(' ', trim($name));
                                    $initials = strtoupper(
                                        (isset($words[0]) ? substr($words[0], 0, 1) : '') .
                                            (isset($words[1]) ? substr($words[1], 0, 1) : ''),
                                    );
                                @endphp

                                @if ($photo)
                                    <img src="{{ asset('storage/' . $photo) }}" alt="Foto {{ $name }}"
                                        class="w-12 h-12 rounded-full object-cover">
                                @else
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-400 rounded-full flex items-center justify-center text-white font-bold">
                                        {{ $initials }}
                                    </div>
                                @endif
                            </td>

                            <td class="p-3">{{ $alumni->nama }}</td>
                            <td class="p-3">{{ $alumni->jenis_kelamin }}</td>
                            <td class="p-3">{{ $alumni->fakultas }}</td>
                            <td class="p-3">{{ $alumni->prodi }}</td>
                            <td class="p-3">{{ $alumni->periode }}</td>
                            <td class="p-3 text-center space-x-1">
                                <!-- Show -->
                                <a href="{{ route('alumni.show', $alumni->id) }}"
                                    class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded text-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-4 text-center text-gray-500">Belum ada data ketua umum</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr class="bg-green-50 font-bold">
                        <td colspan="8" class="p-3 text-right">
                            Total Ketua Umum: {{ $ketuaUmum->total() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="mt-4 flex justify-between items-center">
            <p class="text-gray-500">Halaman {{ $ketuaUmum->currentPage() }} dari {{ $ketuaUmum->lastPage() }}</p>
            <div class="flex space-x-2">
                @if ($ketuaUmum->onFirstPage())
                    <span class="px-3 py-1 bg-gray-200 rounded">«</span>
                @else
                    <a href="{{ $ketuaUmum->previousPageUrl() }}"
                        class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">«</a>
                @endif

                @foreach ($ketuaUmum->getUrlRange(1, $ketuaUmum->lastPage()) as $page => $url)
                    @if ($page == $ketuaUmum->currentPage())
                        <span class="px-3 py-1 bg-green-500 text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                            class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($ketuaUmum->hasMorePages())
                    <a href="{{ $ketuaUmum->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">»</a>
                @else
                    <span class="px-3 py-1 bg-gray-200 rounded">»</span>
                @endif
            </div>
        </div>
    </div>
@endsection
