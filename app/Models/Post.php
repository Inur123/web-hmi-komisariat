<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'penulis_id', 'title', 'slug', 'status', 'content',
        'thumbnail', 'category_id', 'published_at', 'views'
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
}
