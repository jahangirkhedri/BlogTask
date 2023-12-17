<?php

namespace Module\acl;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AclModuleProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/Databases/migrations');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('admin',function ($user){
            return $user->is_admin;
        });

        Gate::define('author',function ($user){
            return $user->is_author;
        });
    }
}
