<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJayBlogTagCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jay_blog_tag_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("blog_id")->comment("文章id");
            $table->integer("term_id")->comment("分类或者标签id");
            $table->tinyInteger("type")->default(1)
                ->comment("类型，默认1 为标签， 2为分类");
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
        Schema::dropIfExists('jay_blog_tag_categories');
    }
}
