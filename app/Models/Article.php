<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'image',
    ];

    // Relasi ke User (Penulis)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi Many-to-Many ke model Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Event listener untuk menghapus gambar saat artikel dihapus
    protected static function booted()
    {
        static::deleting(function ($article) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
        });
    }
}
