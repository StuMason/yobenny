<?php

use Faker\Generator as Faker;
use App\Thing;
use App\User;

$factory->define(Thing::class, function (Faker $faker) {
    return [
        'owner_id' => factory(User::class)->create(),
        'approved_by' => factory(User::class)->create(),
        'start_date' => $faker->dateTime,
        'end_date' => $faker->dateTime,
        'image_url' => $faker->imageUrl(),
        'location_url' => $faker->url,
        'description' => $faker->paragraph,
    ];
});
