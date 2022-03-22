<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRasMovimentacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ras_movimentacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data_evento');
            $table->string('status', 100);
            $table->longtext('descricao');
            $table->integer('ras_objeto_id')->unsigned();
            $table->foreign('ras_objeto_id')->references('id')->on('ras_objetos')->onDelete('cascade');
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
        Schema::drop('ras_movimentacaos');
    }
}
