<?php

namespace App\Providers;

use App\Tag;
use Illuminate\Support\ServiceProvider;

class TagProvider extends ServiceProvider
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
            $web_tags_products = Tag::whereHas('taggables', function($query){
                $query->where('taggable_type', 'App\Product');
            })->get();
            $view->with('web_tags_products', $web_tags_products);
        });
    }
}
