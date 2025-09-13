@extends('admin.layouts.app')

@section('title', 'Edit Alumni')

@section('content')
    <div class="w-full p-8 bg-white/80 rounded-3xl shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Alumni</h2>

        <form action="{{ route('alumni.update', $alumnus->id) }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-bold text-gray-800 mb-2">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $alumnus->nama) }}"
                    class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
                @error('nama')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-bold text-gray-800 mb-2">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                    class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
                    <option value="L" {{ old('jenis_kelamin', $alumnus->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                        Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $alumnus->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                        Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block font-bold text-gray-800 mb-2">Jabatan</label>
                <select name="jabatan" class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
                    <option value="Alumni" {{ old('jabatan', $alumnus->jabatan) == 'Alumni' ? 'selected' : '' }}>Alumni
                    </option>
                    <option value="Ketua Umum" {{ old('jabatan', $alumnus->jabatan) == 'Ketua Umum' ? 'selected' : '' }}>
                        Ketua Umum</option>
                </select>
                @error('jabatan')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block font-bold text-gray-800 mb-2">Alamat</label>
                <textarea name="alamat" rows="3" class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">{{ old('alamat', $alumnus->alamat) }}</textarea>
                @error('alamat')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-bold text-gray-800 mb-2">No HP</label>
                <input type="text" name="nohp" value="{{ old('nohp', $alumnus->nohp) }}"
                    class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
                @error('nohp')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-bold text-gray-800 mb-2">Foto</label>
                <input type="file" name="foto"
                    class="w-full px-4 py-3 border border-green-200 rounded-2xl bg-white focus:outline-none">
                @if ($alumnus->foto)
                    <img src="{{ asset('storage/' . $alumnus->foto) }}" class="w-24 h-24 rounded-xl mt-2 object-cover">
                @endif
                @error('foto')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-bold text-gray-800 mb-2">Fakultas</label>
                <input type="text" name="fakultas" value="{{ old('fakultas', $alumnus->fakultas) }}"
                    class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
                @error('fakultas')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-bold text-gray-800 mb-2">Prodi</label>
                <input type="text" name="prodi" value="{{ old('prodi', $alumnus->prodi) }}"
                    class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
                @error('prodi')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-bold text-gray-800 mb-2">Periode</label>
                <input type="text" name="periode" value="{{ old('periode', $alumnus->periode) }}"
                    class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
                @error('periode')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>



            <!-- Tombol submit full width -->
            <div class="md:col-span-2">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-2xl font-bold transition-all cursor-pointer ">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
