<?php

use Faker\Generator as Faker;

$factory->define(App\AffType::class, function (Faker $faker) {
    return [
        'afftypeName' => 'Resource Person'
    ];
});
