<?php

use Faker\Generator as Faker;

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'user_type_id' => 2,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        // 'password' => $password ?: $password = bcrypt('secret'),
        'password' => 'qwerty',
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Payment::class, function (Faker $faker) {

    return [
        'payment_type_id' => 1,
        'user_id' => rand(2, 10),
        'payment_amount' => rand(1000, 5000),
        'payment_code' => str_random(15),
    ];
});

$factory->define(App\Occasion::class, function (Faker $faker) {

    return [
        'occasion' => $faker->word,
        'registration_deadline' => date('Y-m-d', strtotime('+' . rand(10, 60) . ' days')),
        'occasion_date' => date('Y-m-d', strtotime('+' . rand(20, 60) . ' days')),
        'member_price' => rand(1000, 5000),
        'nonmember_price' => rand(1000, 5000),
    ];
});
