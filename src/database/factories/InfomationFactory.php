<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AdminUser;
use App\Models\Infomation;
use Faker\Generator as Faker;

$factory->define(Infomation::class, function (Faker $faker) {
    $users = AdminUser::all();
    return [
        'user_id' => $users->random()->id,
        'title' => $faker->word,
        'content' => $faker->paragraph(),
        'release_date' => $faker->dateTimeBetween('-1 month', '+1 month'),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
        'deleted_at' => null,
    ];
});
