<?php

namespace App\Models;

use App\Events\CategoryDeletedEvent;
use App\Events\CategorySavedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $dispatchesEvents = [
        'saved' => CategorySavedEvent::class,
        'deleted' => CategoryDeletedEvent::class,
    ];
}
