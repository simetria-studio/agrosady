<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUndOpcaosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('und_opcaos', function (Blueprint $table) {
			$table->increments('id');
			$table->text('opcao');
			$table->integer('und_pergunta_id')->unsigned();
			$table->foreign('und_pergunta_id')->references('id')->on('und_perguntas');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('und_opcaos');
	}
}
