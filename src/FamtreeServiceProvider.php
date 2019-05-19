<?php

namespace FamtreeV3;

use FamtreeV3\Http\Controllers\SendController;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class FamtreeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::macro('forward', function ($route, $method = 'get', $controller = null, $prefix = null) {
            if (!$controller) {
                $controller = [SendController::class, 'send'];
            }

            Route::$method($route, $controller)->middleware("forward:$prefix");
        });

        $this->publishes([
            __DIR__ . './config/famtree.php' => config_path('famtree.php'),
        ], 'config');
    }

    public function register()
    {
    }
}
