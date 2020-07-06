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
        factory(\App\Models\HomeSource::class)->times(30)->create();
    }
}
