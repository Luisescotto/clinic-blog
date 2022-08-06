<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promotion;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Promotion::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'start_date' => Carbon::now(),
        'ending_date' => Carbon::today()->addDays(rand(1,30)),
        'discount_rate' => $faker->numberBetween($min = 0.01, $max = 1),
    ];
});
