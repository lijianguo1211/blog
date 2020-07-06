<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BlogDetail;
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
static $level = 0;
$factory->define(BlogDetail::class, function (Faker $faker) use ($level) {
    return [
        'blog_id' => ++$level,
        'content_html' => $faker->randomHtml(),
        'content_md' => $faker->realText()
    ];
});
