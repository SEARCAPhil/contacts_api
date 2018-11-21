<?php

use Illuminate\Database\Seeder;

class TraineesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Trainees::class, 1)->create();
    }
}
