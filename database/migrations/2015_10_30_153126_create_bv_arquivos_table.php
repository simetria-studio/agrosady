<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBvArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bv_arquivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 300);
            $table->text('descricao');
            $table->text('arquivo');
            $table->integer('bv_pasta_id')->unsigned();
            $table->foreign('bv_pasta_id')->references('id')->on('bv_pastas')->onDelete('cascade');
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
        Schema::drop('bv_arquivos');
    }
}
