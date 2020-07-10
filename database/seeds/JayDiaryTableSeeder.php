<?php

use Illuminate\Database\Seeder;

class JayDiaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Diary::class)->times(20)->create();
    }
}
