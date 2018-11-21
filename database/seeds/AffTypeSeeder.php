<?php

use Illuminate\Database\Seeder;

class AffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AffType::class, 1)->create();
    }
}
