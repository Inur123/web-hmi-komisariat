@extends('admin.layouts.app')

@section('title', 'Edit Gallery')

@section('content')
<div class="w-full p-8 bg-white/80 rounded-3xl shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Gallery</h2>

    <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $gallery->nama) }}"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
            @error('nama') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="3"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">{{ old('deskripsi', $gallery->deskripsi) }}</textarea>
            @error('deskripsi') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Tanggal -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $gallery->tanggal) }}"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
            @error('tanggal') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Thumbnail -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Thumbnail Lama</label>
            @if($gallery->thumbnail)
                <img src="{{ asset('storage/' . $gallery->thumbnail) }}" alt="Thumbnail Lama" class="w-48 rounded-lg shadow-md mb-2">
            @endif
            <input type="file" name="thumbnail" id="thumbnailInput" class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
            @error('thumbnail') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div id="thumbnailPreviewContainer" class="hidden">
            <label class="block font-bold text-gray-800 mb-2">Preview Thumbnail Baru</label>
            <img id="thumbnailPreview" src="#" alt="Preview Thumbnail" class="w-48 rounded-lg shadow-md">
        </div>

        <!-- Gambar Kegiatan -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Gambar Kegiatan</label>

            <div id="galleriesContainer" class="flex flex-col gap-3">
                <!-- Tampilkan gambar kegiatan lama -->
                @foreach($gallery->images as $img)
                <div class="flex items-start gap-3 flex-col sm:flex-row" data-id="{{ $img->id }}">
                    <img src="{{ asset('storage/' . $img->image) }}" class="w-48 rounded-lg shadow-md mb-1">
                    <button type="button" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-xl font-bold remove-btn">Hapus</button>
                </div>
                @endforeach
            </div>

            <button type="button" id="addGalleryBtn" class="mt-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-xl font-bold">
                Tambah Gambar
            </button>

            <input type="hidden" name="deleted_images" id="deletedImagesInput" value="">
        </div>

        <div class="flex gap-4 mt-4">
            <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-white py-3 rounded-2xl font-bold transition-all cursor-pointer">Update</button>
            <a href="{{ route('galleries.index') }}" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 py-3 rounded-2xl font-bold text-center transition-all">Batal</a>
        </div>
    </form>
</div>

<script>
    // Thumbnail preview
    const thumbnailInput = document.getElementById('thumbnailInput');
    const thumbnailPreview = document.getElementById('thumbnailPreview');
    const thumbnailPreviewContainer = document.getElementById('thumbnailPreviewContainer');

    thumbnailInput.addEventListener('change', function() {
        const file = this.files[0];
        if(file) {
            const reader = new FileReader();
            reader.onload = e => {
                thumbnailPreview.src = e.target.result;
                thumbnailPreviewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            thumbnailPreview.src = '#';
            thumbnailPreviewContainer.classList.add('hidden');
        }
    });

    // Hapus gambar lama
    const galleriesContainer = document.getElementById('galleriesContainer');
    const deletedImagesInput = document.getElementById('deletedImagesInput');
    const deletedImages = [];

    galleriesContainer.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const parent = this.closest('div.flex.items-start');
            const imgId = parent.dataset.id;
            if(imgId) {
                deletedImages.push(imgId);
                deletedImagesInput.value = deletedImages.join(',');
            }
            parent.remove();
        });
    });

    // Tambah gambar baru
    const addGalleryBtn = document.getElementById('addGalleryBtn');

    addGalleryBtn.addEventListener('click', () => {
        const div = document.createElement('div');
        div.classList.add('flex', 'items-start', 'gap-3', 'flex-col', 'sm:flex-row');

        div.innerHTML = `
            <div class="flex flex-col">
                <input type="file" name="galleries[]" class="w-full px-4 py-2 border border-green-200 rounded-2xl focus:outline-none gallery-input">
                <img src="#" alt="Preview Gambar" class="w-48 mt-2 rounded-lg shadow-md hidden gallery-preview">
            </div>
            <button type="button" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-xl font-bold remove-btn">Hapus</button>
        `;

        galleriesContainer.appendChild(div);

        const fileInput = div.querySelector('.gallery-input');
        const previewImg = div.querySelector('.gallery-preview');

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = e => {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                previewImg.src = '#';
                previewImg.classList.add('hidden');
            }
        });

        div.querySelector('.remove-btn').addEventListener('click', () => div.remove());
    });
</script>
@endsection
