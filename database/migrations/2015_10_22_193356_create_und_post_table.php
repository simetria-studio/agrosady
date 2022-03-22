<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUndPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('und_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('data_publicacao');
            $table->string('titulo', 300);
            $table->string('imagem_destaque', 500);
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
    public function down()
    {
        //
    }
}
