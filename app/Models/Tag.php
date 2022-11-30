<?php

namespace App\Models;

use App\Events\TagDeletedEvent;
use App\Events\TagSavedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $dispatchesEvents = [
        'saved' => TagSavedEvent::class,
        'deleted' => TagDeletedEvent::class,
    ];
}
