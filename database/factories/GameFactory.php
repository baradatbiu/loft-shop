<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Game;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Game::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'description' => $faker->text,
        'category_id' => mt_rand(1, 5),
        'price' => 10 * round(0.1 * mt_rand(100, 1000))
    ];
});
