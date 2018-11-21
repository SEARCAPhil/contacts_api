<?php

use Illuminate\Database\Seeder;

class ContactTrainAffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact\TrainAff::class, 3)->create();
    }
}
