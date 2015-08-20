<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'gender' => $faker -> numberBetween(1,2),
        'dob'   => $faker -> dateTimeBetween($startDate = '-30 years', $endDate = '-10 years') 
    ];
});

$factory->define(App\Club::class, function (Faker\Generator $faker) {
    return [
        'name' => 'The '.$faker->company.' Club'
    ];
});

$factory->define(App\Activity::class, function (Faker\Generator $faker) {
    $start = $faker -> dateTimeThisYear();
    $end = $faker -> dateTimeThisYear();
    return [
        'name' => $faker-> sentence,
        'starts_at' => $start,
        'ends_at' => $end
    ];
});
