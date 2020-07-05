<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJayHomeSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jay_home_sources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('theme')->comment('主题');
            $table->string('content')->comment('内容');
            $table->string('author')->nullable()->comment('作者');
            $table->string('from_there')->comment('出处');
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
        Schema::dropIfExists('jay_home_sources');
    }
}
