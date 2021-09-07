<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Resource;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $faker) {
    return [
        'work_id' => rand(1,30),
        'user_id' => rand(1,30),
        'type' => $faker->colorName,
        'refresource_id' => $faker->randomDigitNotNull,
        'unit' => $faker->macProcessor,
        'quantity' => $faker->randomDigitNotNull,
        'observation' => $faker->text,
        'is_active' => rand(0,1),
    ];
});
