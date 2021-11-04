<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'full_text','category_id'];

    /**
     * Get the tags for the blog post.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the post that owns the comment.
     */
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
