<?php

namespace Dangkhoa\Plugins\User\src\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Register config of plugin
        $this->mergeConfigFrom(__DIR__ . '/../../config/user_config.php', 'user_plugin');

        require_once __DIR__ . '/../Constant/user_constant.php';

        $this->registerRoute();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->publishes([
            __DIR__ . '/../../database/migrations' => base_path('database/migrations/user_plugin'),
        ], 'plugin_user_migration');
    }

    /**
     * Register route for plugin
     *
     * @return void
     */
    public function registerRoute(): void
    {
        if (class_exists(RouteServiceProvider::class)) {
            $this->app->register(RouteServiceProvider::class);
        }
    }
}
