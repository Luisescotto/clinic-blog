<?php

namespace App\Providers;

use App\PaymentPlatform;
use Illuminate\Support\ServiceProvider;

class PaymentMethodProvider extends ServiceProvider
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
            $web_payment_methods = PaymentPlatform::take(2)->get();
            $view->with('web_payment_methods', $web_payment_methods);
        });
    }
}
