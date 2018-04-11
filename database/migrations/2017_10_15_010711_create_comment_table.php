<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->string('ip_comment')->nullable();
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->integer('report')->default(0);
            $table->string('status');
            $table->string('table_name');
            $table->string('table_id');
            $table->integer('parent_id')->default(0);
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
        Schema::dropIfExists('comment');
    }
}
