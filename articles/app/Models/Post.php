<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','title','image','description','category_id','tag_id'
    ];

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function tag(){

        return $this->belongsToMany(Tag::class);

    }
}
