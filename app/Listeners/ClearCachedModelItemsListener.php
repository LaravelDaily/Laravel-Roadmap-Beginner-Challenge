<?php

namespace App\Listeners;

class ClearCachedModelItemsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($model)
    {
        $cacheKey = str(get_class($model))->afterLast('\\')->lower();
        cache()->forget("all-{$cacheKey}");
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
    }
}
