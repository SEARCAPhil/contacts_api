<?php

use Faker\Generator as Faker;

$factory->define(App\Saaf\Classes::class, function (Faker $faker) {
    return [
        'saafclass' => 'Graduate Alumni',
    ];
});
