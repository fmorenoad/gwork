<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Work;
use Faker\Generator as Faker;

$factory->define(Work::class, function (Faker $faker) {
    return [
        "user_id" => rand(1,10),
        "enterprise" => $faker->company,
        "responsible_team" => $faker->company,
        "refwork_id" => $faker->randomDigitNotNull,
        "normal_hour" => $faker->randomDigitNotNull,
        "extra_hour" => $faker->randomDigitNotNull,
        "frequency" => $faker->sentence,
        "highway" => $faker->sentence,
        "route" => $faker->sentence,
        "direction" => $faker->sentence,
        "start" => $faker->randomDigitNotNull,
        "end" => $faker->randomDigitNotNull,
        "origin" => $faker->sentence,
        "amount_of_work" => $faker->sentence,
        "observation" => $faker->sentence,
    ];
});
