<?php

namespace FamtreeV3;

use FamtreeV3\API\Famtree;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class FamtreeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . './config/famtree.php' => config_path('famtree.php'),
        ], 'config');
    }

    public function register()
    {
        App::bind('famtree', function () {
            return new Famtree();
        });
    }
}
