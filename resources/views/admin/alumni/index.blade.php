@extends('admin.layouts.app')

@section('title', 'Data Alumni')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white/80 rounded-3xl shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Data Alumni</h2>
            <a href="{{ route('alumni.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-2xl shadow-md transition-all">
                + Tambah Alumni
            </a>
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
                        $no = ($alumnis->currentPage() - 1) * $alumnis->perPage() + 1;
                    @endphp
                    @forelse($alumnis as $alumni)
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
                            <td class="p-3">
                                <div class="flex items-center justify-center gap-2 whitespace-nowrap">
                                    <!-- Show -->
                                    <a href="{{ route('alumni.show', $alumni->id) }}"
                                        class="w-9 h-9 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded-lg text-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('alumni.edit', $alumni->id) }}"
                                        class="w-9 h-9 flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('alumni.destroy', $alumni->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin hapus?')"
                                            class="w-9 h-9 flex items-center justify-center bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-4 text-center text-gray-500">Belum ada data alumni</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr class="bg-green-50 font-bold">
                        <td colspan="8" class="p-3 text-right">
                            Total Alumni: {{ $alumnis->total() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="mt-4 flex justify-between items-center">
            <p class="text-gray-500">Halaman {{ $alumnis->currentPage() }} dari {{ $alumnis->lastPage() }}</p>
            <div class="flex space-x-2">
                @if ($alumnis->onFirstPage())
                    <span class="px-3 py-1 bg-gray-200 rounded">«</span>
                @else
                    <a href="{{ $alumnis->previousPageUrl() }}"
                        class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">«</a>
                @endif

                @foreach ($alumnis->getUrlRange(1, $alumnis->lastPage()) as $page => $url)
                    @if ($page == $alumnis->currentPage())
                        <span class="px-3 py-1 bg-green-500 text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                            class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($alumnis->hasMorePages())
                    <a href="{{ $alumnis->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">»</a>
                @else
                    <span class="px-3 py-1 bg-gray-200 rounded">»</span>
                @endif
            </div>
        </div>
    </div>
@endsection
