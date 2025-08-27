<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['title', 'fulltext', 'image_path', 'category_id'];

    function category() {
        return $this->belongsTo(Category::class);
    }

    function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('images')
            ->useDisk('articleFiles');
    }
}
