<?php

use Faker\Generator as Faker;
use App\Models\Role;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence,
        'name' => $faker->word,
    ];
});