<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Post;
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

$factory->define(Post::class, function (Faker $faker) {
    return [
        'unique_id' => $faker->uuid,
        'user_id' => User::all()->random()->id,
        'location' => $faker->city.' ('.$faker->state .')', 
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->realText($maxNbChars = 1600, $indexSize = 2) ,
        'thumb' => 'images/default.png',
    ];
});
