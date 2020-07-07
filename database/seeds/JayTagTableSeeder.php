<?php

use Illuminate\Database\Seeder;

class JayTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Tag::class)->times(100)->create();
    }
}
