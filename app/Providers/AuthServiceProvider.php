<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Post' => 'App\Policies\AnyPolicy',
        'App\Models\Product' => 'App\Policies\AnyPolicy',
        'App\Models\Order' => 'App\Policies\AnyPolicy',
        'App\Models\ThanSo' => 'App\Policies\AnyPolicy',
        'App\Models\User' => 'App\Policies\AnyPolicy',
        'App\Models\Permission' => 'App\Policies\AnyPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }
    }
}
