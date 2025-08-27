<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function articles() : HasMany 
    {
        return $this->hasMany(Article::class);
    }

    // Mutator for Name column
    // when "name" will save, it will convert into Uppercasefirst
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
