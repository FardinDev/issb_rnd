<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Post;
use App\Comment;
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

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'unique_id' => $faker->uuid,
        'user_id' => User::all()->random()->id,
        'post_id' => Post::all()->random()->id,
        'location' => $faker->city.' ('.$faker->state .')',
        'comment' => $faker->realText($maxNbChars = 100, $indexSize = 2),
    ];
});
