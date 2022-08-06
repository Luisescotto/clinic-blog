<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $name = $this->faker->unique()->word();
    return [
        'code'=>$faker->ean8,
        'name'=>$name,
        'slug'=>Str::slug($name),
        'stock'=>150,
        'short_description'=>$faker->realText($maxNbChars = 360, $indexSize = 2),
        'long_description'=>$faker->randomHtml(2,3),
        'date'=>$faker->dateTime(),
        'sell_price'=>$faker->randomNumber(2),
        'status'=>'Shop',
        'category_id'=>rand(1,30),
        'provider_id'=>rand(1,10),
        'guest_id'=>rand(1,10),
    ];
});