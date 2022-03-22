<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriaEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 300);
            $table->date('data');
            $table->time('hora');
            $table->string('local', 500);
            $table->string('imagem', 500);
            $table->longtext('descricao');
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
        Schema::drop('galeria_eventos');
    }
}
