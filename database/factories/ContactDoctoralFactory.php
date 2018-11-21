<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Doctoral::class, function (Faker $faker) {
    return [
        'contact_id' => 1, 
        'phdInstitute' => $faker->company, 
        'phdField' => $faker->text(20), 
        'phdGrad' => date('Y'), 
        'phdScholarship' => $faker->text(50),
        'phdCountry' => $faker->country,
    ];
});
