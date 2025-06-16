<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        "name",
        "tag_color",
    ];

    public function articles(): BelongsToMany{
        return $this->belongsToMany(Article::class);
    }
}
