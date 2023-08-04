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
        $this->mergeConfigFrom(__DIR__ . '/../../config/user_config.php', 'user_plugin_config');
        $this->mergeConfigFrom(__DIR__ . '/../../config/sanctum.php', 'user_plugin_sanctum');
        $this->mergeConfigFrom(__DIR__ . '/../../config/auth.php', 'user_plugin_auth');

        config(['sanctum' => config('user_plugin_sanctum')]);
        config(['auth' => config('user_plugin_auth')]);

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
            __DIR__ . '/../../database/migrations' => base_path('database/migrations/plugin_manager/user_plugin'),
        ], 'plugin_user_migration');
   

        // $this->publishes([
        //     __DIR__ . '/../../config/sanctum.php' => config_path('sanctum.php'),
        // ], 'plugin_user_auth_config');

        // $this->publishes([
        //     __DIR__ . '/../../config/auth.php' => config_path('auth.php'),
        // ], 'plugin_user_auth_config');
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
