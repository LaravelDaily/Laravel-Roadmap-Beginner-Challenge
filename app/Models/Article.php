<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'categoryId'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'categoryId');
    }
    public function user() {
        return $this->belongsTo(User::class, 'userId')->withDefault();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag', 'articleId', 'tagId');
    }
    
    public function images() {
        return $this->belongsToMany(Image::class, 'article_image', 'articleId', 'imageId');
    }
}
