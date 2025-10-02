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
        $penulis = Penulis::all(); // Tambahkan penulis
        return view('admin.posts.create', compact('categories', 'tags', 'penulis'));
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
        ]);

        $thumbnailPath = $request->file('thumbnail') ? $request->file('thumbnail')->store('posts/thumbnails', 'public') : null;

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

        if ($request->tags) {
            $tags = explode(',', $request->tags);
            $tagIds = [];
            foreach ($tags as $tagName) {
                $tagName = trim($tagName);
                $tag = Tag::firstOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $tagIds[] = $tag->id;
            }
            $post->tags()->sync($tagIds);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts/images', 'public');
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
        ]);

        // Ganti thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail && Storage::exists('public/' . $post->thumbnail)) {
                Storage::delete('public/' . $post->thumbnail);
            }
            $post->thumbnail = $request->file('thumbnail')->store('posts/thumbnails', 'public');
        }

        // Update data post
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

        // Update tags
        if ($request->tags) {
            $tags = explode(',', $request->tags);
            $tagIds = [];
            foreach ($tags as $tagName) {
                $tagName = trim($tagName);
                $tag = Tag::firstOrCreate(['name' => $tagName], ['slug' => Str::slug($tagName)]);
                $tagIds[] = $tag->id;
            }
            $post->tags()->sync($tagIds);
        } else {
            $post->tags()->sync([]);
        }
        // Hapus gambar yang ditandai
        if ($request->has('deleted_images')) {
            foreach ($request->deleted_images as $imageId) {
                $img = $post->images()->find($imageId);
                if ($img) {
                    if (Storage::exists('public/' . $img->image)) {
                        Storage::delete('public/' . $img->image);
                    }
                    $img->delete();
                }
            }
        }


        // Tambah gambar baru tanpa menghapus existing
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts/images', 'public');
                $post->images()->create(['image' => $path]);
            }
        }
        return redirect()->route('posts.index')->with('success', 'Berita berhasil diperbarui.');
    }


  public function destroy(Post $post)
{
    // Hapus thumbnail kalau ada
    if ($post->thumbnail && Storage::exists('public/'.$post->thumbnail)) {
        Storage::delete('public/'.$post->thumbnail);
    }

    // Hapus semua gambar terkait
    foreach ($post->images as $img) {
        if (Storage::exists('public/'.$img->image)) {
            Storage::delete('public/'.$img->image);
        }
        $img->delete();
    }

    // Simpan tag sebelum di-detach
    $tags = $post->tags;

    // Lepas semua relasi tag dari post ini
    $post->tags()->detach();

    // Hapus post
    $post->delete();

    // Cek setiap tag, apakah masih dipakai post lain
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

        if ($image->image && file_exists(public_path('storage/' . $image->image))) {
            unlink(public_path('storage/' . $image->image));
        }

        $image->delete();

        return response()->json(['success' => true]);
    }
    public function show(Post $post)
    {
        // Load relasi penulis, kategori, tags, dan images
        $post->load('penulis', 'category', 'tags', 'images');
        return view('admin.posts.show', compact('post'));
    }
}
