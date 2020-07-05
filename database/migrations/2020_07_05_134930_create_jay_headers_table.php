<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJayHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jay_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('header_name', 191)
                ->unique()
                ->comment("网站头部标题");
            $table->string('header_url')
                ->comment("跳转地址");
            $table->tinyInteger('parent')->default(0)
                ->comment('分类父id');
            $table->tinyInteger('sort')->default(0)
                ->comment("排序");
            $table->tinyInteger('status')->default(0)
                ->comment("是否展示，默认不展示");
            $table->integer('user_id')
                ->comment('最新操作人');
            $table->tinyInteger('deleted_at')->default(0)
                ->comment("是否删除。默认为0，不删除，1删除");
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
        Schema::dropIfExists('jay_headers');
    }
}
