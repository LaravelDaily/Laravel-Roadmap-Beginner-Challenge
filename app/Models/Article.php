<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'details', 'category_id', 'image'];

    public function category(): BelongsTo 
    {
        return $this->belongsTo(Category::class);
    }

    public function tags() : BelongsToMany 
    {
        return $this->belongsToMany(Tag::class);   
    }
}
