<?php

use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factory;

class HomeSourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = new Factory(new Generator);
        $generator = new Generator;
        $factory->define(\App\Models\HomeSource::class, function (Generator $generator) {
            return [
                'theme' => $generator->title,
                'content' => $generator->text(200),
                'author' => $generator->name,
                'from_there' => $generator->url,
            ];
        });
    }
}
