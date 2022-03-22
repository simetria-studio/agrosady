<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('seos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seo_pagina', 300);
            $table->string('seo_title', 300);
            $table->string('seo_description', 500);
            $table->string('seo_keywords', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('seos');
    }

}
