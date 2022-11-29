<?php

namespace App\Models;

use App\Listeners\ClearCachedModelItemsListener;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $dispatchesEvents = [
        'saved' => ClearCachedModelItemsListener::class,
        'deleted' => ClearCachedModelItemsListener::class,
    ];
}
