<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogPostsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('blog_posts', function (Blueprint $table) {
			$table->increments('id');
			$table->datetime('data_publicacao');
                        $table->string('imagem_destaque', 500);
			$table->string('titulo', 300);
			$table->string('subtitulo', 500);
			$table->longtext('descricao');
			$table->string('autor', 100);
                        $table->string('slug')->nullable();
			$table->timestamps();
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('blog_posts');
	}
}
