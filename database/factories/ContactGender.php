<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Gender::class, function (Faker $faker) {
    return [
        'genderName' => $faker->randomElements(['male', 'female'])[0],
    ];
});
