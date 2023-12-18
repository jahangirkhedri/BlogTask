<?php

namespace Module\user;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
//        Factory::guessFactoryNamesUsing(function ($modelClass) {
//            $namespace = 'Module\\user\\Databases\\Factories'; // Adjust the namespace
//            $path = app_path(str_replace('\\', DIRECTORY_SEPARATOR, $namespace));
//
//            return $path;
//        });

        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return Str::before($modelName, '\Models') . '\Databases\Factories\\' .
                Arr::last(explode('\\', $modelName)) . 'Factory';
        });
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
