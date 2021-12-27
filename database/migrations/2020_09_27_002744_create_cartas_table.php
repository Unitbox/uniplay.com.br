<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('carta');
            $table->unsignedBigInteger('idioma_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('nivel_dificuldade_id');
            $table->string('observacao');
           
            $table->timestamps();

            $table->foreign('idioma_id')->references('id')->on('idiomas')->onDelete('CASCADE');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('CASCADE');
            $table->foreign('nivel_dificuldade_id')->references('id')->on('dificuldades')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartas');
    }
}
