<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagArticle extends Model
{
    use HasFactory;

    protected $table = 'tag_article';

    protected $fillable = ['article_id', 'tag_id'];
}
