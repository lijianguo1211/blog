<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJayTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jay_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tag_name')
                ->comment("标签 name");
            $table->string("tag_slug")
                ->comment("标签 url");
            $table->integer("parent")
                ->default(0)->comment("父id");
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
        Schema::dropIfExists('jay_tags');
    }
}
