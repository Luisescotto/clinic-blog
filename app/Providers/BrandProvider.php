<?php

namespace App\Providers;

use App\Brand;
use Illuminate\Support\ServiceProvider;

class BrandProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("*", function($view){
            $brands = Brand::all();
            $view->with('web_brands', $brands);
        });
    }
}
