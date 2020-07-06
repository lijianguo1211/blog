<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJayBlogDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jay_blog_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('blog_id')->comment("文章id");
            $table->text('content_html')->comment("文章内容 html");
            $table->text('content_md')->comment("文章内容 md");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jay_blog_details');
    }
}
