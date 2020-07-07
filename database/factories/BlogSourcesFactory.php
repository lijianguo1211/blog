<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog;
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

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'img_path' => $faker->image(storage_path('app/public')),
        'key_word' => $faker->word(),
        'post_status' => mt_rand(1, 5),
        'source' => mt_rand(1, 3)
    ];
});
