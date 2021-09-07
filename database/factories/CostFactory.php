<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cost;
use Faker\Generator as Faker;

$factory->define(Cost::class, function (Faker $faker) {
    return [
        'type'=>$faker->mimeType,
        'unit_of_measurement'=>$faker->randomDigitNotNull,
        'cost'=>$faker->randomDigitNotNull,
        'unit_of_money'=>$faker->countryCode,
        'execution_date'=>$faker->dateTime,
        'is_active'=>rand(0,1),
        
     ];
});
