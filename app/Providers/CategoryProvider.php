<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;

class CategoryProvider extends ServiceProvider
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
            $web_categories = Category::where('categorizable_type', 'Product')->get();
            $view->with('web_categories', $web_categories);
        });
    }
}
