<?php

use Illuminate\Database\Seeder;

class ContactDoctoralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\Doctoral::class, 1)->create();
    }
}
