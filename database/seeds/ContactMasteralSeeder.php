<?php

use Illuminate\Database\Seeder;

class ContactMasteralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\Masteral::class, 1)->create();
    }
}
