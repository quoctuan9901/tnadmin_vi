<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('script_code')->nullable();
            $table->string('image');
            $table->string('alt')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->string('status');
            $table->integer('access');
            $table->string('target_open');
            if (env('APP_LANG')) {
                $table->string('name_en')->nullable();
                $table->text('description_en')->nullable();
                $table->string('link_en')->nullable();
            }
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('position');
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
        Schema::dropIfExists('banner');
    }
}
