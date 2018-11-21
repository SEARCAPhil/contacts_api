<?php

use Illuminate\Database\Seeder;

class ContactBachelorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\Bachelor::class, 1)->create();
    }
}
