<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGvVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gv_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 300);
            $table->longtext('caminho');
            $table->integer('gv_galeria_id')->unsigned();
            $table->foreign('gv_galeria_id')->references('id')->on('gv_galerias')->onDelete('cascade');
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
        Schema::drop('gv_videos');
    }
}
