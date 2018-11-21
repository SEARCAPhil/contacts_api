<?php

use Illuminate\Database\Seeder;

class ContactFellowAffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\FellowAff::class, 2)->create();
    }
}
