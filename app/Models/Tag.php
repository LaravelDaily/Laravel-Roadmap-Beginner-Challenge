<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function scopeFilter($query, array $filters)
    {
        //dd($filters['tag']);

        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }
    }


    public function articles(){
        return $this->belongsToMany(Article::class);
    }
}
