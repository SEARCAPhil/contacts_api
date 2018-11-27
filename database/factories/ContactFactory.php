<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'affiliateCode' => $faker->ein,
        'prefix' => $faker->title, 
        'lastname' => $faker->firstName(),
        'firstname' => $faker->lastName(),
        'middleinit' => $faker->firstName(),
        'nickname' => $faker->firstName(),
        'gender' => $faker->randomElements(['male', 'female'])[0],
        'birthdate' => date('Y'),
        'spouse' => $faker->name,
        'children' => 1,
        'hobbies' => 'table tennis',
        'nationality' => $faker->countryCode,
        'specialization' => $faker->text(100),
        'homeAddress' => $faker->address,
        'homeCountry' => $faker->country,
        'homeZipCode' => $faker->postCode,
        'homeCountryCode' => $faker->countryCode,
        'homeAreaCode' => $faker->areaCode,
        'civilStat' => $faker->randomElements(['single', 'married'])[0],
        'others' => $faker->text,
        'rank' => 1,
        'suffix' => $faker->suffix,
    ];
});
