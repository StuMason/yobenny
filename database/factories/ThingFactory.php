<?php

use Faker\Generator as Faker;
use App\Models\Thing;
use App\Models\User;

$factory->define(Thing::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'owner_uuid' => factory(User::class)->create(),
        'approved_by' => factory(User::class)->create(),
        'start_date' => $faker->dateTime,
        'end_date' => $faker->dateTime,
        'start_time' => $faker->dateTime,
        'end_time' => $faker->dateTime,
        'image_url' => $faker->imageUrl(),
        'location_url' => $faker->url,
        'description' => $faker->paragraph,
    ];
});
