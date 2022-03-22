<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnqueteOpcaosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('enquete_opcaos', function (Blueprint $table) {
			$table->increments('id');
			$table->text('opcao');
                        $table->integer('votos');
			$table->integer('enquete_pergunta_id')->unsigned();
			$table->foreign('enquete_pergunta_id')->references('id')->on('enquete_perguntas');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('enquete_opcaos');
	}
}
