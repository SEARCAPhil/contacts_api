<?php

use Illuminate\Database\Seeder;

class ContactEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\Education::class, 2)->create();
    }
}
