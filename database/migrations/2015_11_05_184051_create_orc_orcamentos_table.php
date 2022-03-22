<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrcOrcamentosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orc_orcamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_carga', 200);
            $table->string('tomador_servico', 100);
            $table->string('origem', 300);
            $table->string('destino', 300);
            $table->integer('peso');
            $table->decimal('valor_nota', 10, 2);
            $table->text('status');
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
    public function down() {
        Schema::drop('orc_orcamentos');
    }

}
