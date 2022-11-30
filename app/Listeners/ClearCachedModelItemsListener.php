<?php

namespace App\Listeners;

class ClearCachedModelItemsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $cacheKey = str(get_class($event->model))->afterLast('\\')->lower();
        cache()->forget("all-{$cacheKey}");
    }
}
