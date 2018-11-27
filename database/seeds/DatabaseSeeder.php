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
            SectorSeeder::class,
            AffTypeSeeder::class,
            ContactSeeder::class,
            ContactEmploymentSeeder::class,
            ContactEngagementSeeder::class,
            ContactFellowAffSeeder::class,
            TraineesSeeder::class,
            ContactTrainingSeeder::class,
            ContactCommunicationSeeder::class,
            ContactEducationSeeder::class,
            ContactResearchSeeder::class,
            ContactConferenceSeeder::class,
            ContactConferenceLectureSeeder::class,
        ]);
    }
}
