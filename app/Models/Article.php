<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Article extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable =[
        'title',
        'text',
        'category_id',
        'image_path',
    ];    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }    
}
