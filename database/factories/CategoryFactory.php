<?php

use Faker\Generator as Faker;
use App\Thing;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'thing_id' => factory(Thing::class)->create(),
    ];
});