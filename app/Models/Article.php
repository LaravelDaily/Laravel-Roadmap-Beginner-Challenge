<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table        = 'articles';
    protected $fillable     = [
        'title',
        'content',
        'image',
        'category_id',
        'user_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->hasMany(ArticleTag::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
