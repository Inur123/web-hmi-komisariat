<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryKegiatanController extends Controller
{
   public function index()
   {
       // Ambil semua gallery beserta thumbnail atau gambar utama
       $galleries = Gallery::with('images')->orderBy('tanggal', 'desc')->get();

       return view('user.gallery.index', compact('galleries'));
   }
     public function show(Gallery $gallery)
    {
        $gallery->load('images'); // pastikan semua gambar terkait diambil
        return view('user.gallery.show', compact('gallery'));
    }
}
