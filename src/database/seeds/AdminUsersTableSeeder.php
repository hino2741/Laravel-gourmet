<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            [
                'id' => '1',
                'name' => '田中',
                'email' => 'tanaka@gmail.com',
                'password' => Hash::make('tanaka1234'),
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id' => '2',
                'name' => '日野',
                'email' => 'hino@gmail.com',
                'password' => Hash::make('hino1234'),
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
