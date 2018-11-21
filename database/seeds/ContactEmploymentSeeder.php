<?php

use Illuminate\Database\Seeder;

class ContactEmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\Employment::class, 1)->create();
    }
}
