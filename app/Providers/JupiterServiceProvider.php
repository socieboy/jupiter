<?php

namespace Socieboy\Jupiter\Providers;

use Socieboy\Jupiter\Console\Install;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageServiceProvider;

class JupiterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->defineRoutes();
        });
        $this->defineResources();
        $this->registerDependencies();
    }

    /**
     * Define the Jupiter routes.
     * @return void
     */
    protected function defineRoutes()
    {
        $this->register(ImageServiceProvider::class);
        if (! $this->app->routesAreCached()) {
            $router = app('router');
            $router->group([
                'namespace' => 'Socieboy\Jupiter\Http\Controllers',
                'middleware' => 'web',
            ], function ($router) {
                require __DIR__.'/../Http/routes.php';
            });
        }
    }

    /**
     * Define the resources used by Spark.
     * @return void
     */
    protected function defineResources()
    {
        $this->loadViewsFrom(JUPITER_PATH.'/resources/views', 'jupiter');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                JUPITER_PATH.'/resources/views' => base_path('resources/views/vendor/jupiter'),
            ], 'jupiter-full');
        }
    }

    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        if (! defined('JUPITER_PATH')) {
            define('JUPITER_PATH', realpath(__DIR__.'/../../'));
        }
        if ($this->app->runningInConsole()) {
            $this->commands([Install::class]);
        }
        include __DIR__ . '/../helpers.php';
    }

    protected function registerDependencies()
    {
        $this->app->register('Intervention\Image\ImageServiceProvider');
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Image', 'Intervention\Image\Facades\Image');
    }
}