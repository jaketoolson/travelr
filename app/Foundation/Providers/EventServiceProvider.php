<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Foundation\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
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
