<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the tags for the blog post.
     */
    public function articles()
    {
        return $this->belongsToMany(Articles::class);
    }
}
