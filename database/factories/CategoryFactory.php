<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Category::class, function (Faker $faker) {
    $name=$this->faker->unique()->word();
    return [
        'name'=>$name,
        'slug'=>Str::slug($name),
        'categorizable_type'=>$faker->randomElement([
            'Product',
            'Post',
            ]),
        'description'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'parent_id' => null,
        'icon'=>$faker->randomElement([
        'fa-camera',
        'fa-clock-o',
        'fa-television',
        'fa-tablet',
        'fa-book',
        'fa-microchip',
        'fa-bullhorn',
        ]),
    ];
});

$factory->state(App\Category::class, 'withParent', function (Faker $faker) {
    return [
        'icon' => null,
        'categorizable_type' => null,
        'parent_id' => App\Category::inRandomOrder()->take(1)->first()->id,
    ];
});

$factory->state(App\Category::class, 'withParentSubcategory', function (Faker $faker) {
    return [
        'icon' => null,
        'categorizable_type' => null,
        'parent_id' => App\Category::inRandomOrder()->take(1)->first()->id,
    ];
});