<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Penulis;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

// Intervention Image v3
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('penulis', 'category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $penulis = Penulis::all();
        return view('admin.posts.create', compact('categories', 'tags', 'penulis'));
    }

    /**
     * ✅ Convert upload image menjadi .webp dan simpan ke storage/public
     * Return: path relatif (contoh: posts/thumbnails/xxxx.webp)
     */
    private function convertToWebp($file, string $folder, int $quality = 80): string
    {
        $filename = Str::uuid()->toString() . '.webp';
        $path = trim($folder, '/') . '/' . $filename;

        $manager = new ImageManager(new Driver());
        $image = $manager->read($file->getRealPath());

        // encode ke webp (Intervention Image v3)
        $webp = $image->encode(new WebpEncoder(quality: $quality));

        Storage::disk('public')->put($path, (string) $webp);

        return $path;
    }

    private function syncTagsFromString(Post $post, ?string $tagsString): void
    {
        if (!$tagsString) {
            $post->tags()->sync([]);
            return;
        }

        $tags = array_filter(array_map('trim', explode(',', $tagsString)));
        $tagIds = [];

        foreach ($tags as $tagName) {
            if ($tagName === '') continue;

            $tag = Tag::firstOrCreate(
                ['name' => $tagName],
                ['slug' => Str::slug($tagName)]
            );

            $tagIds[] = $tag->id;
        }

        $post->tags()->sync($tagIds);
    }

    public function store(Request $request)
    {
        $request->validate([
            'penulis_id' => 'required|exists:penulis,id',
            'title' => 'required|unique:posts,title',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'thumbnail' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120',
            'tags' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        // ✅ Thumbnail -> WEBP
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $this->convertToWebp($request->file('thumbnail'), 'posts/thumbnails', 80);
        }

        $post = Post::create([
            'penulis_id' => $request->penulis_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'status' => $request->status ?? 'draft',
            'content' => $request->content,
            'thumbnail' => $thumbnailPath,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at,
        ]);

        // ✅ Tags
        $this->syncTagsFromString($post, $request->tags);

        // ✅ Images -> WEBP
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imgFile) {
                $path = $this->convertToWebp($imgFile, 'posts/images', 80);
                $post->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $penulis = Penulis::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'penulis'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'penulis_id' => 'required|exists:penulis,id',
            'title' => 'required|unique:posts,title,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'thumbnail' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120',
            'tags' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        // ✅ Ganti thumbnail kalau upload baru
        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $post->thumbnail = $this->convertToWebp($request->file('thumbnail'), 'posts/thumbnails', 80);
        }

        $post->update([
            'penulis_id' => $request->penulis_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'status' => $request->status ?? 'draft',
            'content' => $request->content,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at,
            'thumbnail' => $post->thumbnail,
        ]);

        // ✅ Update tags
        $this->syncTagsFromString($post, $request->tags);

        // ✅ Hapus gambar yang ditandai (by id)
        if ($request->has('deleted_images')) {
            foreach ((array) $request->deleted_images as $imageId) {
                $img = $post->images()->find($imageId);
                if ($img) {
                    if ($img->image && Storage::disk('public')->exists($img->image)) {
                        Storage::disk('public')->delete($img->image);
                    }
                    $img->delete();
                }
            }
        }

        // ✅ Tambah images baru -> WEBP
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imgFile) {
                $path = $this->convertToWebp($imgFile, 'posts/images', 80);
                $post->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        // Hapus thumbnail
        if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        // Hapus semua gambar terkait
        foreach ($post->images as $img) {
            if ($img->image && Storage::disk('public')->exists($img->image)) {
                Storage::disk('public')->delete($img->image);
            }
            $img->delete();
        }

        // Simpan tags dulu
        $tags = $post->tags;

        // detach tags
        $post->tags()->detach();

        // delete post
        $post->delete();

        // hapus tag yang tidak dipakai lagi
        foreach ($tags as $tag) {
            if ($tag->posts()->count() === 0) {
                $tag->delete();
            }
        }

        return redirect()->route('posts.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function deleteImage($id)
    {
        $image = PostImage::findOrFail($id);

        if ($image->image && Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return response()->json(['success' => true]);
    }

    public function show(Post $post)
    {
        $post->load('penulis', 'category', 'tags', 'images');
        return view('admin.posts.show', compact('post'));
    }
}
