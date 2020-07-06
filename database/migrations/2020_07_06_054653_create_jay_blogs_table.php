<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJayBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jay_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment("文章标题");
            $table->string('img_path')->nullable()->comment("文章封面图");
            $table->string('key_word')->nullable()->comment("友好搜索的关键词");
            $table->integer('user_id')->default(0)->comment("作者, 默认为0，代表匿名");
            $table->tinyInteger('post_status')->default(1)
                ->comment("文章状态：1草稿， 2 发布， 3 预发布 4 关闭， 5下架");
            $table->tinyInteger("source")->default(1)
                ->comment("文章类型，默认为1，原创，2转载， 3翻译");
            $table->tinyInteger('is_series')->default(0)
                ->comment("是否是系列文章，默认0，不是，1是系列文章");
            $table->tinyInteger("is_top")->default(0)->comment("是否置顶，默认0，1置顶");
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
        Schema::dropIfExists('jay_blogs');
    }
}
