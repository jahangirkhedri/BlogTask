<?php

namespace Module\user;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserModuleProvider extends ServiceProvider
{
    protected string $routeNamespaces = "Module\user\Http\Controllers";
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/Databases/migrations');
       $this->loadViewsFrom(__DIR__.'/Resources/views','user');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::middleware('web')
            ->namespace($this->routeNamespaces)
            ->group(__DIR__ . "/routes/routes.php");
    }
}
