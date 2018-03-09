<?php

namespace Orion\Travelr\Providers;

use Illuminate\Support\ServiceProvider;
use Orion\Travelr\Repositories\PlanetEloquentRepository;
use Orion\Travelr\Repositories\PlanetRepository;

class ModelRepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PlanetRepository::class, PlanetEloquentRepository::class);
    }
}
