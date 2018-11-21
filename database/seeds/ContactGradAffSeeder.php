<?php

use Illuminate\Database\Seeder;

class ContactGradAffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\GradAff::class, 3)->create();
    }
}
