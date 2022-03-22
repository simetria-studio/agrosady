<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdutosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagem_destaque', 1000);
            $table->string('imagem_banner', 1000);
            $table->string('nome', 500);
            $table->longtext('descricao');
            $table->decimal('preco', 10, 2)->nullable();
            $table->decimal('preco_promocional', 10, 2)->nullable();
            $table->date('data_promocao')->nullable();
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
        Schema::drop('produtos');
    }

}
