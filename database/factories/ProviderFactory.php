<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->streetName,
        'email'=>$faker->email,
        'rnc'=>$faker->randomNumber(),
        'address'=>$faker->address,
        'phone'=>$faker->phoneNumber,
    ];
});