<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable=['title','text','file_path','category_id'];
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'articles_tags_pivot');
    }
}
