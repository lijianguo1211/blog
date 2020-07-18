<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJayNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jay_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('热点标题');
            $table->string('content')->comment('热点简介');
            $table->string('slug')->comment('热点详情跳转地址');
            $table->string('order')->comment('排序');
            $table->string('status')->default(0)
                ->comment('是否显示,默认0不显示，1显示');
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
        Schema::dropIfExists('jay_news');
    }
}
