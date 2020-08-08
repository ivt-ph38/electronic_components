<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Configuration;
use Config;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $configurations = Configuration::all();

        foreach ($configurations as $configuration) {

            View::share($configuration->name, $configuration->value);

            Config::set($configuration->name, $configuration->value);

        }
    }
}
