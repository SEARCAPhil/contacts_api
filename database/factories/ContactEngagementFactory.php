<?php

use Faker\Generator as Faker;

$factory->define(App\Contact\Engagement::class, function (Faker $faker) {
    return [
        'contact_id' => 1, 
        'engageFrom' => date('Y'), 
        'engageTo' => (date('Y') + 3), 
        'researchId' => 1, 
        'engagement' => 'Professorial Chair',
        'type' => 'council',
    ];
});
