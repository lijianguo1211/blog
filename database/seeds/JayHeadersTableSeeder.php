<?php

use Illuminate\Database\Seeder;

class JayHeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Header::create(
            ['header_name' => '首页', 'header_url' => '/', 'user_id' => 1, 'status' => 1]
        );
        \App\Models\Header::create(
            ['header_name' => 'Blog', 'header_url' => '/blog', 'user_id' => 1, 'status' => 1]
            );
        \App\Models\Header::create(
            ['header_name' => '分享', 'header_url' => '/source', 'user_id' => 1, 'status' => 1]

            );
        \App\Models\Header::create(
            ['header_name' => '日记', 'header_url' => '/diary', 'user_id' => 1, 'status' => 1]
        );
        \App\Models\Header::create(
            ['header_name' => '关于我', 'header_url' => '/abort_me', 'user_id' => 1, 'status' => 1]
        );
    }
}
