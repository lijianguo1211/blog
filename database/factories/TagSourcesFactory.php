<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag;
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

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'tag_name' => $faker->city,
        'tag_slug' => $faker->slug,
        'parent' => 0
    ];
});
