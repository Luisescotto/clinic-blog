<?php

namespace App\Providers;

use App\SocialMedia;
use Illuminate\Support\ServiceProvider;

class SocialMediaProvider extends ServiceProvider
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
            $web_social_networks = SocialMedia::get();
            $view->with('web_social_networks', $web_social_networks);
        });
    }
}
