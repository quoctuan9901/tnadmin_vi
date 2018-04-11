<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_id')->default(0);
            $table->integer('position')->default(1);
            $table->text('description')->nullable();
            $table->integer('access');
            $table->string('target_open');
            $table->string('meta_robot');
            $table->string('image')->nullable();
            $table->string('alt')->nullable();
            $table->string('status');
            $table->string('slug')->nullable();
            $table->string('title_tag')->nullable();
            $table->string('meta_keywords_tag')->nullable();
            $table->string('meta_description_tag')->nullable();
            if (env('APP_LANG')) {
                $table->string('name_en')->nullable();
                $table->text('description_en')->nullable();
                $table->string('slug_en')->nullable();
                $table->string('title_tag_en')->nullable();
                $table->string('meta_keywords_tag_en')->nullable();
                $table->string('meta_description_tag_en')->nullable();
            }
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('category');
    }
}
