<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Conference\Lecture::class, function (Faker $faker) {
    return [
        'conference_id' => 1,
        'paperTitle' => $faker->text(100),
        'lectureTitle' => $faker->text(20),
        'dateStarted' => date('Y-m-d'),
        'dateEnded' => date('Y-m-d'),
        'lectureVenue' => $faker->address,
    ];
});
