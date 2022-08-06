<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    $name = $this->faker->unique()->word();
    return [
        'name'=>$name,
        'description'=>$faker->realText($maxNbChars = 360, $indexSize = 2),
    ];
});
