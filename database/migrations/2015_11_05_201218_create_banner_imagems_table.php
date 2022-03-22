<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerImagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_imagems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 300);
            $table->string('caminho', 500);
            $table->integer('banner_id')->unsigned();
            $table->foreign('banner_id')->references('id')->on('banners');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('link', 1000);
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
        Schema::drop('banner_imagems');
    }
}
