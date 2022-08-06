<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Tag::class, function (Faker $faker) {
    $name = $this->faker->unique()->word();

    return [
        'name'=>$name,
        'slug'=>Str::slug($name),
        'description'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});