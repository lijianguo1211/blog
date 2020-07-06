<?php

use Illuminate\Database\Seeder;

class JayBlogDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\BlogDetail::class)->times(500)->create();
    }
}
