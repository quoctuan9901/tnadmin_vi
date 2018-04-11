<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_site');
            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('logo')->nullable();

            $table->string('copyright')->nullable();
            $table->string('author')->default('Vũ Quốc Tuấn');
            $table->string('dc_created')->nullable();
            $table->string('dc_rights_copyright')->default('QuocTuan.Info');
            $table->string('dc_creator_name')->default('Vũ Quốc Tuấn');
            $table->string('dc_creator_email')->default('contact.quoctuan@gmail.com');
            $table->string('dc_identifier')->nullable();
            $table->string('dc_language')->default('vi-VN');
            $table->string('robots')->default('index,follow');
            $table->string('geo_placename')->default('Ho Chi Minh, Viet Nam');
            $table->string('geo_region')->nullable();
            $table->string('geo_position')->nullable();
            $table->string('icbm')->nullable();
            $table->string('revisit_after')->default('days');

            $table->string('host')->nullable();
            $table->string('email')->nullable();
            $table->string('pass')->nullable();
            $table->integer('port')->nullable();

            $table->string('no_photo')->nullable();
            $table->integer('item_page_news')->default(10);
            $table->integer('item_page_product')->default(10);

            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('google_plus')->nullable();
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
        Schema::dropIfExists('config');
    }
}
