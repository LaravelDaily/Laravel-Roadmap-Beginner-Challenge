<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    public static $adminRoute = 'admin.articles';

    public $fillable = ['title', 'description', 'image_path', 'category_id'];

    public static $rules = [
        'title' => ['required', 'min:3', 'max:50'],
        'description' => ['required', 'min:10', 'max:500'],
        'image' => ['sometimes', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048']
    ];

    public static $messages = [
        'title.required' => ("Title is required"),
        'title.min' => ("Title can not be less than 3 letters"),
        'title.max' => ("Title can not be more than 50 letters"),

        'description.required' => ("Description is required"),
        'description.min' => ("Description can not be less than 10 letters"),
        'description.max' => ("Description can not be more than 500 letters")
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)
            ->using(ArticleTag::class)
            ->withTimeStamps();
    }
}
