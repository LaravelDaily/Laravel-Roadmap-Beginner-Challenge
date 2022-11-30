<?php

namespace App\Providers;

use App\Events\CategoryDeletedEvent;
use App\Events\CategorySavedEvent;
use App\Events\TagDeletedEvent;
use App\Events\TagSavedEvent;
use App\Listeners\ClearCachedModelItemsListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TagSavedEvent::class => [
            ClearCachedModelItemsListener::class
        ],
        TagDeletedEvent::class => [
            ClearCachedModelItemsListener::class
        ],
        CategoryDeletedEvent::class => [
            ClearCachedModelItemsListener::class
        ],
        CategorySavedEvent::class => [
            ClearCachedModelItemsListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
