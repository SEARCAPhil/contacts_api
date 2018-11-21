<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\GradAff::class, function (Faker $faker) {
    return [
        'contact_id' => 1, 
        'saaftype_id' => 1, 
        'hostUniv' => $faker->company,
        'fieldStudy' => $faker->text(50),
        'thesisTitle' => $faker->text(100),
        'yearStart' => (date('Y') - 1),
        'yearComplete' => date('Y'),
        'funding' => $faker->text(50),
        'remarks' => $faker->text(),
    ];
});
