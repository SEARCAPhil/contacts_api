<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Bachelor::class, function (Faker $faker) {
    return [
        'contact_id' => 1, 
        'bsInstitute' => $faker->text(20), 
        'bsCountry' => $faker->country, 
        'bsField' => $faker->text(20), 
        'bsGrad' => date('Y'),
        'bsScholarship' => $faker->text(20),
    ];
});
