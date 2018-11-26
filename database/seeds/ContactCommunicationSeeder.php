<?php

use Illuminate\Database\Seeder;

class ContactCommunicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\Communication::class, 2)->create();
    }
}
