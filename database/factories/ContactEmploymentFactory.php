<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Employment::class, function (Faker $faker) {
    return [
        'contact_id' => 1, 
        'companyName' => $faker->company, 
        'companyAddress' => $faker->address, 
        'position' => $faker->jobTitle, 
        'employedFrom' => date('Y'), 
        'employedTo' => (date('Y') + 2),
    ];
});
