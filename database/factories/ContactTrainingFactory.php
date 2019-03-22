<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Training::class, function (Faker $faker) {
    return [
        'contact_id' => 1,
        'saaftype_id' => 1,
        'title' => $faker->text(100),
        'notes' => $faker->text(100),
        'dateStarted' => date('Y-m-d'),
        'dateEnded' => date('Y-m-d'),
        'venue' => $faker->address,
        'sponsor' => $faker->company,
        'trainingType' => $faker->randomElements(['short_courses', 'online_courses'])[0],
        'organizingAgency' => $faker->company,
        'hostUniversity' => $faker->company,
    ];
});
