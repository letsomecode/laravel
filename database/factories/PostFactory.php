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
        'title' => $faker->realText(50),
        'content' => $faker->realText(200),
        'author_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});

$factory->state(Post::class, 'published', function (Faker $faker) {
    return [
        'published_at' => $faker->dateTimeBetween('-2 years')
    ];
});
