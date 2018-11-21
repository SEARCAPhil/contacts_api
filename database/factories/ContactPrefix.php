<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Prefix::class, function (Faker $faker) {
    return [
        'prefix' => 'Mr.',
    ];
});
