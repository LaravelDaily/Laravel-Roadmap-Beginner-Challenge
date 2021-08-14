<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name'];

    public function articles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Article::class);
    }
}
