<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'full_text', 'category_id', 'image'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getDateAttribute() {
       return $this->created_at->format('Y-m-d');
    }

    public function getImageAttribute() {
        if(! $this->attributes['image']) {
            return '/images/default_image.jpg';
        }

        return '/storage/uploads/'.$this->attributes['image'];
    }

    public function tag() {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }
}
