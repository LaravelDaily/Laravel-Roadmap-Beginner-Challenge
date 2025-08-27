<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Image extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
    ];

    public function article () {
        return $this->belongTo(Article::class, 'article_image', 'imageId', 'articleId');
    }

    public function user () {
        return $this->belongsTo(User::class, 'userId')->withDefault();
    }
}
