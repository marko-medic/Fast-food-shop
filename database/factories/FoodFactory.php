<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        "name" => $faker->text(20),
        "price" => $faker->randomDigit,
        "description" => $faker->text(200),
        "toppings" => []
    ];
});
