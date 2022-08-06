<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guest;
use Faker\Generator as Faker;

$factory->define(Guest::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
        'description' =>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'image' =>$faker->imageUrl($width = 640, $height = 480),
    ];
});