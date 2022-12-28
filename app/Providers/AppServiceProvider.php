<?php

namespace App\Providers;

use App\Models\Catagory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // gloal $catagories valiale 
        view()->composer('*', function($view){
            $catagories = Catagory::all();
            $view->with('catagories', $catagories);
        });
    }
}
