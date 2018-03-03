<?php

namespace Orion\Travelr\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Orion\Travelr\Events\Event' => [
            'Orion\Travelr\Listeners\EventListener',
        ],
    ];

    public function boot(): void
    {
        parent::boot();

        //
    }
}
