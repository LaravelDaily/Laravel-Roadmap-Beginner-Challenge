<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title'];

    public static $adminRoute = 'admin.tags';
    public static $rules = [
        'title' => ['required', 'min:3', 'max:50']
    ];

    public static $messages = [
        'title.required' => ("Title is required"),
        'title.min' => ("Title can not be less than 3 letters"),
        'title.max' => ("Title can not be more than 50 letters")
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class)
            ->using(ArticleTag::class)
            ->withTimeStamps();
    }
}
