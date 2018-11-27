<?php

use Faker\Generator as Faker;

$factory->define(App\Trainees::class, function (Faker $faker) {
    return [
        'contact_id' => 1,
        'training_id' => 1,
    ];
});
