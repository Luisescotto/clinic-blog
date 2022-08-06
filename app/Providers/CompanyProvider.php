<?php

namespace App\Providers;

use App\Business;
use Illuminate\Support\ServiceProvider;

class CompanyProvider extends ServiceProvider
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
            $business = Business::where('id', 1)->firstOrFail();
            $view->with('web_company', $business);
        });
    }
}
