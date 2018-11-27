<?php

use Illuminate\Database\Seeder;

class ContactConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\Conference::class, 1)->create();
    }
}
