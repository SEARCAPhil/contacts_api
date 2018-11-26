<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Research::class, function (Faker $faker) {
    return [
        'contact_id' => 1,
        'saaftype_id' => 1,
        'title' => $faker->text(100),
        'dateStarted' => date('Y') - 1,
        'dateEnded' => date('Y'),
    ];
});
