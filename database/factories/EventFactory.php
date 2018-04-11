<?php

use Faker\Generator as Faker;
use App\Models\Event;
use App\Models\User;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'owner_uuid' => factory(User::class)->create(),
        'approved_by' => factory(User::class)->create(),
        'start_date' => $faker->dateTime,
        'end_date' => $faker->dateTime,
        'start_time' => $faker->dateTime,
        'end_time' => $faker->dateTime,
        'image_url' => $faker->imageUrl(),
        'description' => implode($faker->words(10), " "),
    ];
});
