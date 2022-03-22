<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnqueteRespostasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('enquete_respostas', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('enquete_pergunta_id')->unsigned();
			$table->foreign('enquete_pergunta_id')->references('id')->on('enquete_perguntas');
                        $table->integer('enquete_opcao_id')->unsigned();
			$table->foreign('enquete_opcao_id')->references('id')->on('enquete_opcaos');
			$table->text('resposta');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('enquete_respostas');
	}
}
