<?php

namespace Orion\Travelr\Providers;

use Illuminate\Support\ServiceProvider;
use Orion\Travelr\Repositories\PlanetInterface;
use Orion\Travelr\Repositories\PlanetRepository;

class ModelRepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PlanetInterface::class, PlanetRepository::class);
    }
}
