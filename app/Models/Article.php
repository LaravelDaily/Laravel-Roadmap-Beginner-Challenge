<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id', 'category_id','image'];

    public function scopeFilter($query, array $filters)
    {
        //dd($filters['tag']);

        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');

                //->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        //return $this->hasOne(Category::class)->ofMany();
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
