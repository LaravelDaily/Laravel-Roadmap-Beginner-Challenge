<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Category extends Model
{
    use HasFactory;
    use Userstamps;
    /**
     * Table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    protected $fillable =[
        'name',
    ];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
