<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Communication::class, function (Faker $faker) {
    return [
        'contact_id' => 2,
        'type' => $faker->randomElements(['mobile', 'phone', 'fax'])[0],
        'value' => $faker->phoneNumber
    ];
});
