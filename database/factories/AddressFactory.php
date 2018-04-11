<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Event;

$factory->define(App\Models\Address::class, function (Faker $faker) {
    return [
        "uuid" => $faker->uuid,
        "street_number" => $faker->randomNumber(),
        "route" => $faker->streetAddress,
        "postal_code" => $faker->postcode,
        "longitude" => $faker->longitude,
        "latitude" => $faker->latitude,
        "country" => $faker->country,
        "address_json" => json_encode($faker->words),
        "contact_number" => $faker->phoneNumber,
        "user_uuid" => factory(User::class)->create()->id,
        "event_uuid" => factory(Event::class)->create()->id
    ];
});
