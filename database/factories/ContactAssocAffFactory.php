<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\AssocAff::class, function (Faker $faker) {
    return [
        'contact_id' => 1, 
        'saaftype_id' => 1, 
        'researchTitle' => $faker->text(100), 
        'yearStart' => (date('Y') - 5), 
        'yearComplete' => date('Y'), 
        'paperTitle' => $faker->text(100), 
        'confTitle' => $faker->text(50), 
        'dateConf' => (date('Y') - 5), 
        'venueConf' => $faker->address, 
        'lectureTitle' => $faker->text(50), 
        'dateLect' => (date('Y') - 5),
        'venueLect' => $faker->address,
    ];
});
