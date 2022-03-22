<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMotoristasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('motoristas', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nome', 100);
			$table->string('email', 100);
			$table->string('telefone', 100);
			$table->text('veiculo');
			$table->text('rota');
			$table->text('observacoes');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('motoristas');
	}
}
