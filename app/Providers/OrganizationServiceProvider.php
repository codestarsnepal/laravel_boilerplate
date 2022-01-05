<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OrganizationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(
            'App\Repositories\OrganizationRepositoryInterface',
            'App\Repositories\OrganizationRepository'
        );
    }
}
