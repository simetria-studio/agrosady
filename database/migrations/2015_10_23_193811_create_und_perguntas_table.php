<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUndPerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('und_perguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('pergunta');
            $table->text('descricao');
            $table->text('opcao_correta');
            $table->integer('und_post_id')->unsigned();
            $table->foreign('und_post_id')->references('id')->on('und_posts');
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
        Schema::drop('und_perguntas');
    }
}
