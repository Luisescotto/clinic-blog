<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'business_id'=>1,
        'body'=>'<h2>our new range of</h2><h1>woman</h1><h5>for less than $199.00</h5>',
    ];
});
