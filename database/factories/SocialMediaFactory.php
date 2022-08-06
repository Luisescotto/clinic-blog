<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SocialMedia;
use Faker\Generator as Faker;

$factory->define(SocialMedia::class, function (Faker $faker) {
    return [

        'name'=>$faker->randomElement([
            'Twitter',
            'Instagram',
            'Google-plus',
            'Youtube',
            'Facebook',
        ]),
        'url'=>'https://www.youtube.com/channel/UCqz_FTTHfc1gBGoYK0P8_vg',
        'icon'=>$faker->randomElement([
            'fa-twitter',
            'fa-instagram',
            'fa-google-plus',
            'fa-youtube',
            'fa-facebook',
        ]),
        'business_id'=>1,

        
        
        
        
    ];
});
