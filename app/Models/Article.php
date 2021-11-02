<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'image', 'category_id'];

    protected $with = ['category', 'tags'];

    public function getImageAttribute($image)
    {
        return str_starts_with($image, 'https')
            ? $image
            : asset('storage/' . $image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
