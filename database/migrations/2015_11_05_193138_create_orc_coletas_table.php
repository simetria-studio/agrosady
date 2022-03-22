<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrcColetasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orc_coletas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data_coleta');
            $table->string('local', 100);
            $table->string('orcamento', 300);
            $table->string('observacao', 300);
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
        Schema::drop('orc_coletas');
    }

}
