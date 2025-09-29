<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   public function index()
    {
        // Ambil 6 post terbaru yang aktif
        $recentPosts = Post::where('status', 'active')
                           ->orderByDesc('published_at')
                           ->take(6)
                           ->get();

        return view('user.home.index', compact('recentPosts'));
    }
}
