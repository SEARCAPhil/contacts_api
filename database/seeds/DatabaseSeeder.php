<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            SaafClassesSeeder::class,
            ContactGenderSeeder::class,
            ContactPrefixSeeder::class,
            SaafTypeSeeder::class,
            SectorSeeder::class,
            AffTypeSeeder::class,
            ContactSeeder::class,
            ContactBachelorSeeder::class,
            ContactMasteralSeeder::class,
            ContactDoctoralSeeder::class,
            ContactEmploymentSeeder::class,
            ContactEngagementSeeder::class,
            ContactAssocAffSeeder::class,
            ContactFellowAffSeeder::class,
            ContactGradAffSeeder::class,
            ContactTrainAffSeeder::class,
            TraineesSeeder::class,
            ContactTrainingSeeder::class,
            ContactCommunicationSeeder::class,
            ContactEducationSeeder::class,
            ContactResearchSeeder::class,
        ]);
    }
}
