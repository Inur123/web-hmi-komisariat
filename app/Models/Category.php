<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['nama', 'slug'];

    // otomatis buat slug saat membuat category
    protected static function booted()
    {
        static::creating(function ($category) {
            $category->slug = Str::slug($category->nama);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->nama);
        });
    }
     public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
