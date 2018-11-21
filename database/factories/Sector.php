<?php

use Faker\Generator as Faker;

$factory->define(App\Sector::class, function (Faker $faker) {
    return [
        'sectorName' => 'Government',
    ];
});
