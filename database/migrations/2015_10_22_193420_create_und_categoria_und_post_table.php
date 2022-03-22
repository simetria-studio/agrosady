<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUndCategoriaUndPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('und_categoria_und_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('und_post_id')->unsigned();
            $table->foreign('und_post_id')->references('id')->on('und_posts');
            $table->integer('und_categoria_id')->unsigned();
            $table->foreign('und_categoria_id')->references('id')->on('und_categorias');
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
