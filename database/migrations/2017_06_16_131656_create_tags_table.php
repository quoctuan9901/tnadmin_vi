<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tags');
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('title_tag')->nullable();
            $table->string('meta_keywords_tag')->nullable();
            $table->string('meta_description_tag')->nullable();
            if (env('APP_LANG')) {
                $table->string('tags_en')->nullable();
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
        Schema::dropIfExists('tags');
    }
}
