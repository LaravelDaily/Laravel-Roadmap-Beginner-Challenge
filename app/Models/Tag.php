<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function articles() : BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => "#".$value,
            set: fn (string $value) => str_replace('#', '', $value),
        );
    }
}
