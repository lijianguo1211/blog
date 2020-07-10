<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Diary;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
| Unable to locate factory with name
*/

$factory->define(Diary::class, function (Faker $faker) {
    $imgPath = storage_path('app/public');
    return [
        'title' => $faker->titleFemale,
        'img_path' => $faker->image($imgPath),
        'content' => $faker->text,
        'nick_name' => $faker->lastName,
        'ip' => $faker->ipv4
    ];
});
