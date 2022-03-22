<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiImagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gi_imagems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('caminho', 500);
            $table->integer('gi_galeria_id')->unsigned();
            $table->foreign('gi_galeria_id')->references('id')->on('gi_galerias');
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
        Schema::drop('gi_imagems');
    }
}
