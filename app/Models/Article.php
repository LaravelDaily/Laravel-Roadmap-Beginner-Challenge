<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'image_path'
    ];

    /**
     * Get the user that owns the article.
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
