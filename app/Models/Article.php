<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $guarded = [];

    public function getExcerptAttribute()
    {
        return strlen($this->body) > 155 ?
            substr($this->body, 0, 154).' ...' :
            $this->body;
    }

    public function getUrlAttribute()
    {
        return route('articles.show', $this);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
