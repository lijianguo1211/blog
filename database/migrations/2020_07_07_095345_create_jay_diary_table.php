<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJayDiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jay_diary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title")->comment("日记主题");
            $table->string("img_path")->comment("日记配图");
            $table->text("content")->comment("日记内容");
            $table->string("nick_name")->comment("选择匿名，使用昵称显示");
            $table->string("ip", 30)->comment("ip地址记录");
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
        Schema::dropIfExists('jay_diary');
    }
}
