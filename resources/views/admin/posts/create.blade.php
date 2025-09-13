@extends('admin.layouts.app')

@section('title', 'Tambah Post Baru')

@section('content')
<div class="w-full p-8 bg-white/80 rounded-3xl shadow-lg max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Post Baru</h2>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <!-- Judul -->
        <div class="md:col-span-2">
            <label class="block font-bold text-gray-800 mb-2">Judul *</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
            @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Penulis -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Penulis *</label>
            <select name="penulis_id" required
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
                <option value="">-- Pilih Penulis --</option>
                @foreach($penulis as $item)
                    <option value="{{ $item->id }}" {{ old('penulis_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
            @error('penulis_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Kategori -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Kategori *</label>
            <select name="category_id" required
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Status -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Status</label>
            <select name="status"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Nonactive</option>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
            </select>
        </div>

        <!-- Tanggal Publish -->
        <div>
            <label class="block font-bold text-gray-800 mb-2">Tanggal Publish</label>
            <input type="date" name="published_at" value="{{ old('published_at') }}"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
        </div>

        <!-- Thumbnail -->
        <div class="md:col-span-2">
            <label class="block font-bold text-gray-800 mb-2 flex items-center justify-between">
                Thumbnail
                <span class="text-xs text-gray-500">Maksimal 5 MB</span>
            </label>
            <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl bg-white focus:outline-none">
            <div id="thumbnail-preview" class="mt-2"></div>
            @error('thumbnail') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Additional Images -->
        <div class="md:col-span-2">
            <label class="block font-bold text-gray-800 mb-2 flex items-center justify-between">
                Gambar Tambahan
                <span class="text-xs text-gray-500">Maksimal 5 MB per gambar</span>
            </label>

            <div id="image-inputs" class="space-y-4"></div>

            <button type="button" id="add-image-input"
                class="px-4 py-2 bg-blue-500 text-white rounded-2xl text-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                + Tambah Gambar
            </button>

            @error('images.*') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Konten -->
        <div class="md:col-span-2">
            <label class="block font-bold text-gray-800 mb-2">Konten *</label>
            <textarea name="content" id="content" rows="6"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">{{ old('content') }}</textarea>
            @error('content') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Tags -->
        <div class="md:col-span-2">
            <label class="block font-bold text-gray-800 mb-2">Tags (pisahkan dengan koma)</label>
            <input type="text" name="tags" value="{{ old('tags') }}"
                placeholder="contoh: teknologi, pendidikan"
                class="w-full px-4 py-3 border border-green-200 rounded-2xl focus:outline-none">
            @error('tags') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Tombol submit -->
        <div class="md:col-span-2 flex justify-end space-x-2">
            <a href="{{ route('posts.index') }}" class="px-6 py-3 rounded-2xl bg-gray-200 hover:bg-gray-300">Batal</a>
            <button type="submit" class="px-6 py-3 rounded-2xl bg-green-600 hover:bg-green-700 text-white font-bold">Simpan</button>
        </div>
    </form>
</div>

<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/mimr482vltcpcta1nd94dwlkgbsdgmcyz4n3tve4ydvf4l83/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        menubar: true,
        plugins: 'print preview paste importcss searchreplace autolink autosave code visualblocks fullscreen image link media table lists wordcount textpattern help',
        toolbar: 'undo redo | bold italic underline | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | numlist bullist | link image media | removeformat | fullscreen',
        toolbar_sticky: true,
        height: 300,
        content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }"
    });

    // Preview Thumbnail
    document.getElementById('thumbnail').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('thumbnail-preview');
        previewContainer.innerHTML = "";
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                let img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("h-32", "object-cover", "rounded-md", "shadow");
                previewContainer.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    });

    // Tambah preview gambar tambahan
    document.getElementById('add-image-input').addEventListener('click', function() {
        let container = document.getElementById('image-inputs');

        let wrapper = document.createElement('div');
        wrapper.classList.add('space-y-2');

        wrapper.innerHTML = `
            <div class="flex items-center space-x-2">
                <input type="file" name="images[]" accept="image/*"
                    class="w-full px-4 py-3 border border-green-200 rounded-2xl image-input">
                <button type="button"
                    class="remove-input px-3 py-2 bg-red-500 text-white rounded-2xl text-xs hover:bg-red-600 focus:outline-none">
                    Hapus
                </button>
            </div>
            <div class="preview"></div>
        `;

        container.appendChild(wrapper);

        // tombol hapus
        wrapper.querySelector('.remove-input').addEventListener('click', function() {
            wrapper.remove();
        });

        // preview gambar
        wrapper.querySelector('.image-input').addEventListener('change', function(e) {
            let previewDiv = wrapper.querySelector('.preview');
            previewDiv.innerHTML = "";
            if (e.target.files && e.target.files[0]) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    previewDiv.innerHTML = `<img src="${event.target.result}" class="mt-2 w-32 h-32 object-cover rounded-md border" />`;
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    });
</script>
@endsection
