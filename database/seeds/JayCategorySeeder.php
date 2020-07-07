<?php

use Illuminate\Database\Seeder;

class JayCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Category::class)->times(100)->create();
    }
}
