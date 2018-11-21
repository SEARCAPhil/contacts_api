<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\FellowAff::class, function (Faker $faker) {
    return [
        'contact_id' => 1, 
        'saaftype_id' => 1, 
        'dateFrom' => (date('Y') - 1),
        'dateTo' => date('Y'),
    ];
});
