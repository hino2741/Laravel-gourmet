<?php

use Illuminate\Database\Seeder;
use App\Models\Information;

class InformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Information::class, 10)->create();
    }
}
