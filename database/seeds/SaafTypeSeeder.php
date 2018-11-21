<?php

use Illuminate\Database\Seeder;

class SaafTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Saaf\Type::class, 1)->create();
    }
}
