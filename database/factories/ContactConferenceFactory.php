<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Conference::class, function (Faker $faker) {
    return [
        'contact_id' => 1,
        'title' => $faker->text(50),
        'venue' => $faker->address,
        'dateStarted' => date('Y-m-d')
    ];
});
