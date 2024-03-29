<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Foundation\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $apiNamespace = 'Orion\Travelr\Http\Controllers\Api';
    protected $webNamespace = 'Orion\Travelr\Http\Controllers\Web';

    public function map(): void
    {
        if ($this->app->environment() === 'local') {
            $this->mapLocalRoutes();
        }

        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
             ->namespace($this->webNamespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->apiNamespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapLocalRoutes(): void
    {
        if (file_exists(base_path('routes/local.php'))) {
            Route::middleware('web')
                ->namespace($this->webNamespace)
                ->group(base_path('routes/local.php'));
        }
    }
}
