<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $guarded = [];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
