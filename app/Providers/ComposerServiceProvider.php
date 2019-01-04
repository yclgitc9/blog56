<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Views\Composers\NavigationComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', NavigationComposer::class);        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
