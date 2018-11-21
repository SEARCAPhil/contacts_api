<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Engagement::class, function (Faker $faker) {
    return [
        'contact_id' => 1, 
        'engageFrom' => date('Y'), 
        'engageTo' => (date('Y') + 3), 
        'researchTitle' => $faker->text(50), 
        'engagement' => 'Professorial Chair',
    ];
});
