<?php

use Illuminate\Database\Seeder;

class ContactEngagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\Engagement::class, 1)->create();
    }
}
