<?php

use Illuminate\Database\Seeder;

class ContactPrefixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\Prefix::class, 1)->create();
    }
}
