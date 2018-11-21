<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\TrainAff::class, function (Faker $faker) {
    return [
        'contact_id' => 1,
        'saaftype_id' => 1,
        'trainingTitle' => $faker->text(100) ,
        'dateTrain' => date('Y') - 5,
        'venueTrain' => $faker->address,
        'hostUniv' => $faker->company,
        'yearStart' => date('Y') - 5,
        'yearComplete' => date('Y') - 2,
    ];
});
