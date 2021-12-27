<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo')->unique();
            $table->string('subtitulo');
            $table->text('conteudo')->nullable();
            $table->string('img_background')->nullable();
            $table->string('autor')->nullable();
            $table->string('slug');
            $table->integer('quantidade_acesso')->default(0);
            $table->integer('likes')->default(0);
            $table->boolean('revisao');
            $table->string('tipo');
            $table->integer('ordem');
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
        Schema::dropIfExists('artigos');
    }
}
