<?php

namespace Module\blog;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Module\blog\Contracts\PostServiceInterface;
use Module\blog\Services\PostService;

class BlogModuleProvider extends ServiceProvider
{
    protected string $routeNamespaces = "Module\blog\Http\Controllers";
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        $this->loadViewsFrom(__DIR__.'/Resources/views','blog');
        App::bind(PostServiceInterface::class,PostService::class);

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
