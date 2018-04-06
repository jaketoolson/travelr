<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Foundation\Providers;

use Illuminate\Support\ServiceProvider;
use Orion\Travelr\Repositories\GalaxyEloquentRepository;
use Orion\Travelr\Repositories\GalaxyRepository;
use Orion\Travelr\Repositories\PlanetEloquentRepository;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Repositories\TerrainEloquentRepository;
use Orion\Travelr\Repositories\TerrainRepository;

class DataRepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PlanetRepository::class, PlanetEloquentRepository::class);
        $this->app->bind(GalaxyRepository::class, GalaxyEloquentRepository::class);
        $this->app->bind(TerrainRepository::class, TerrainEloquentRepository::class);
    }
}
