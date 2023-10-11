<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Helpers\StringTrimmerHelper;

class Article extends Model {
    use HasFactory;

    protected $fillable = ['title','fulltext','image','user_id','category_id'];

    /* Relationships */
    public function author() { return $this->belongsTo(User::class); }
    public function category() { return $this->belongsTo(Category::class); }
    public function tags() { return $this->belongsToMany(Tag::class); }

    /* Accessors */
    protected function readWhat(): Attribute {
        return Attribute::make(
            get: fn () => strlen($this->fulltext) > env('MAX_CHARS_ARTICLE_TEXT',200)
                ? 'Read more...'
                : 'Read article.'
        );
    }

    protected function startFulltext(): Attribute {
        return Attribute::make(
            get: fn () => strlen($this->fulltext) > env('MAX_CHARS_ARTICLE_TEXT',200)
                ? StringTrimmerHelper::rightTrimOnSpace($this->fulltext, env('MAX_CHARS_ARTICLE_TEXT',200)) . '...' 
                : $this->fulltext
        );
    }
}