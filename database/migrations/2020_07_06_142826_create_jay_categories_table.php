<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJayCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jay_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categories_name')
                ->comment("分类 name");
            $table->string("categories_slug")
                ->comment("分类 url");
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
        Schema::dropIfExists('jay_categories');
    }
}
