<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

/**
 * Article
 */
class Article extends Model
{
    use HasFactory;

        
    protected $fillable = [
        'title',
        'full_text',
        'category_id',
        'image'
    ];
    
    protected $casts = [
        'category_id' => 'int',
    ];

     
    /**
     * category
     *
     * @return BelongsTo
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * tags
     *
     * @return BelongsToMany
     */
    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
