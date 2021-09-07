<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reffrequency;
use Faker\Generator as Faker;

$factory->define(Reffrequency::class, function (Faker $faker) {
    return [
        'frequency' => $faker->sentence,
    ];
});
