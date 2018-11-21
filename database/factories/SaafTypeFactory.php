<?php

use Faker\Generator as Faker;

$factory->define(App\Saaf\Type::class, function (Faker $faker) {
    return [
        'saafclass_id' => 1,
        'saaftype' => 'MS',
    ];
});
