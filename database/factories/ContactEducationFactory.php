<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Education::class, function (Faker $faker) {
    return [
        'contact_id' => 1,
        'institution' => $faker->company,
        'country' => $faker->country,
        'grad' => date('Y-m-d'),
        'field' => $faker->text(100),
        'scholarship' => $faker->company,
    ];
});
