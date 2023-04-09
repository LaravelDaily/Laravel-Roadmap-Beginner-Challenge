<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleTag extends Pivot
{
    use HasFactory;

    public static $rules = [

    ];

    public static $messages = [

        ];
}
