<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Refwork;
use Faker\Generator as Faker;

$factory->define(Refwork::class, function (Faker $faker) {
    return [
        "item" => $faker->sentence,
        "work" => $faker->sentence,
        "unit" => $faker->sentence,
    ];
});
