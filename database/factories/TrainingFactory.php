<?php

use Faker\Generator as Faker;

$factory->define(App\Training::class, function (Faker $faker) {
    return [
        'trainingId' => $faker->postCode,
        'organizingAgency' => $faker->company,
        'name' => $faker->name,
        'birthDate' => date('Y') - 15,
        'birthPlace' => $faker->address,
        'country' => $faker->country,
        'gender' => $faker->randomElements(['male', 'female'])[0],
        'civilStatus' => $faker->randomElements(['single', 'married'])[0],
        'religion' => $faker->text(20),
        'officeHomeAddress' => $faker->address,
        'contactNumber' => $faker->ssn,
        'faxNo' => $faker->ssn,
        'email' => $faker->email,
        'notes' => $faker->text(),
        'attachments' => $faker->text(20). '.png',
        'bsDegree' => $faker->text(100),
        'bsAwardDate' => date('Y') - 2,
        'bsInstitution' => $faker->company,
        'msDegree' => $faker->text(20),
        'msAwardDate' => date('Y'),
        'msInstitution' => $faker->company,
        'phdDegree' => $faker->text(),
        'phdAwardDate' => date('Y'),
        'phdInstitution' => $faker->company,
        'fieldOfSpecialization' => $faker->text(50),
        'currentPositionTitle' => $faker->jobTitle,
        'organization' => $faker->company,
        'immediateSupervisor' => $faker->name,
        'supervisorDesignation' => $faker->jobTitle,
        'courseAttended' => $faker->text(100),
        'dateStarted' => date('Y-m-d'),
        'dateEnded' => date('Y-m-d'),
        'venue' => $faker->address,
        'sponsor' => $faker->company,
    ];
});
