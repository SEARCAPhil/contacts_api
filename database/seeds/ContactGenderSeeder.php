<?php

use Illuminate\Database\Seeder;

class ContactGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\Gender::class, 2)->create();
    }
}
