<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRdDigitalTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('rd_arquivos', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nome', 300);
			$table->string('armazenamento', 300);
			$table->string('ano', 300);
			$table->string('regiao', 300);
			$table->string('campanha', 300);
			$table->string('setor', 300);
			$table->text('arquivo');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('rd-digital');
	}
}
