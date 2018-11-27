<?php

use Faker\Generator as Faker;

$factory->define(App\Saaf\Classes::class, function (Faker $faker) {
    return [
        'saafclass_parent_id' => 1,
        'saafclass' => 'Graduate Alumni',
    ];
});
