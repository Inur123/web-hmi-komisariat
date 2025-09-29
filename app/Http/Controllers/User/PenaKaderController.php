<?php

namespace App\Http\Controllers\User;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenaKaderController extends Controller
{
    /**
     * Tampilkan halaman Pena Kader dengan post terbaru
     */
    public function index(Request $request)
    {
        $query = Post::with('category')->where('status', 'active');

        // Filter berdasarkan category slug jika ada
        if ($request->has('category') && $request->category != null) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $recentPosts = $query->orderByDesc('published_at')
            ->paginate(9)
            ->withQueryString(); // supaya filter tetap aktif di pagination

        // Ambil semua kategori untuk tombol filter
        $categories = Category::all();

        return view('user.pena-kader.index', compact('recentPosts', 'categories'));
    }

  public function show(Post $post)
{
    // Load relasi
    $post->load('penulis', 'category', 'tags', 'images');

    // Tambah views
    $post->increment('views');

    // Ambil 5 artikel populer (views terbanyak) dengan status aktif
    $popularPosts = Post::with('category')
                        ->where('status', 'active')
                        ->orderByDesc('views')
                        ->take(5)
                        ->get();

    // Ambil semua kategori beserta jumlah post
    $categories = Category::withCount('posts')->get();

    // Ambil semua tag unik di seluruh post
    $allTags = Tag::all()->unique('name');

    return view('user.pena-kader.show', compact('post', 'popularPosts', 'categories', 'allTags'));
}


}
