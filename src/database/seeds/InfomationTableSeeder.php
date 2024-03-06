<?php

use Illuminate\Database\Seeder;
use App\Infomation;

class InfomationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Infomation::class, 10)->create();
    }
}
