<?php

use Illuminate\Database\Seeder;

class JayLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Link::class)->times(10)->create();
    }
}
