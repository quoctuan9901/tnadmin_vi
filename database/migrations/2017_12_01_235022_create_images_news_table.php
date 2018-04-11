<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('images');
            $table->string('alt')->nullable();
            $table->string('position')->default(1);
            $table->integer('news_id')->unsigned();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_news');
    }
}
