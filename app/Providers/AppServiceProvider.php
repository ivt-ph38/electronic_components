<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Configuration;
use App\Post;
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

        $leftposts = Post::where('left', 1)->orderBy('id', 'DESC')->get();

        View::share('leftposts', $leftposts);

        $bottomposts = Post::where('bottom', 1)->orderBy('id', 'DESC')->get();

        View::share('bottomposts', $bottomposts);

        $bottompost1s = Post::where('left', 1)->orderBy('id', 'DESC')->get();

        View::share('bottompost1s', $bottompost1s);
    }
}
