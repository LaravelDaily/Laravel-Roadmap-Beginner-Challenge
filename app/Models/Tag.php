<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Tag extends Model
{
    use HasFactory;
    use Userstamps;
    
    protected $fillable =[
        'name'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class)->withTimestamps();
    }    
}
