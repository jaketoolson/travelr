<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Providers;

use Illuminate\Support\ServiceProvider;
use Orion\Travelr\Repositories\GalaxyEloquentRepository;
use Orion\Travelr\Repositories\GalaxyRepository;
use Orion\Travelr\Repositories\PlanetEloquentRepository;
use Orion\Travelr\Repositories\PlanetRepository;

class DataRepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PlanetRepository::class, PlanetEloquentRepository::class);
        $this->app->bind(GalaxyRepository::class, GalaxyEloquentRepository::class);
    }
}
