<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use HasFactory;

    use InteractsWithMedia;

    protected $fillable = ['title', 'full_text', 'category_id'];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function tags() 
    {
        return $this->belongsToMany(Tag::class, 'tag_article');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(100)
              ->height(100);

        $this->addMediaConversion('thumb_small')
              ->width(50)
              ->height(50);
    }

    public function getImageAttribute() {
        return $this->hasMedia() ? $this->getFirstMedia()->getUrl('thumb') 
                                : 'storage/default_image/default.jpg';
    }

    public function getSmallImageAttribute() {
        return $this->hasMedia() ? $this->getFirstMedia()->getUrl('thumb_small') 
                                : 'storage/default_image/default_small.jpg';
    }
}
