<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',
        'category_id',
        'user_id'
    ];

    /**
     * @return BelongsTo
     */
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
