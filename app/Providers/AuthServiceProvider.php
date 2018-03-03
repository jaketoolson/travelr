<?php

namespace Orion\Travelr\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Orion\Travelr\Model' => 'Orion\Travelr\Policies\ModelPolicy',
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
