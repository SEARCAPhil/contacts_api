<?php

use Illuminate\Database\Seeder;

class ContactConferenceLectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\Conference\Lecture::class, 2)->create();
    }
}
