<?php


use Illuminate\Database\Seeder;

class SaafClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Saaf\Classes::class, 1)->create();
    }
}
