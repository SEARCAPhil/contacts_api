<?php

use Illuminate\Database\Seeder;

class ContactAssocAffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\AssocAff::class, 1)->create();
    }
}
