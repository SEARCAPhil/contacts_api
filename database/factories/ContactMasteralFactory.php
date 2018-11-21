<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Masteral::class, function (Faker $faker) {
    return [
        'contact_id' => 1, 
        'msInstitute' => $faker->company, 
        'msField' => $faker->text(20), 
        'msGrad' => date('Y'), 
        'msScholarship' => $faker->text(50),
        'msCountry' => $faker->country,
    ];
});
