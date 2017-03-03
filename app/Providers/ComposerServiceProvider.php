<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        view()->share('key','value');
//        view()->composer('layouts.app',function ($view){
//        });
          view()->composer('layouts.app','App\Http\ViewComposers\TasksCountComposer');

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
