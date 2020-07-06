<?php

use Illuminate\Database\Seeder;

class JayBlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Blog::class)->times(500)->create();
    }
}
