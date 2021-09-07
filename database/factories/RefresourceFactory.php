<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Refresource;
use Faker\Generator as Faker;

$factory->define(Refresource::class, function (Faker $faker) {
    
    $tipo = ['material','equipment'];
    $aleatorio =  rand(0,1);
    
    return [
        'type' => $tipo[$aleatorio],
        'code' => $faker->randomLetter,
        'resource' => $faker->sentence,
        'unit' => $faker->randomLetter,
        'observation' => $faker->text,
    ];
});
