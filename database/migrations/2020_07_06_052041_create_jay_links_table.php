<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJayLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jay_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title")->comment("友情链接名");
            $table->string("title_slug")->comment("友情链地址");
            $table->tinyInteger('status')->default(0)->comment("是否展示，默认0不展示，1展示");
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
        Schema::dropIfExists('jay_links');
    }
}
