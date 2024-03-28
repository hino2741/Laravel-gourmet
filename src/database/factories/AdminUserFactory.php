<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AdminUser;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(AdminUser::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('tanaka1234'),
        'created_at' => now(),
        'updated_at' => now(),
        'deleted_at' => null,
    ];
});
