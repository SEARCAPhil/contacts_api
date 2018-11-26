<?php

use Illuminate\Database\Seeder;

class ContactTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Contact\Training::class, 2)->create();
    }
}
