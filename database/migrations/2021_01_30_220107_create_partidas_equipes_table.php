<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidasEquipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidas_equipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('partida_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('equipe_id');
            $table->integer('rodada_partida_vez')->default(1);
            $table->integer('rodada_partida_config')->default(1);
            $table->boolean('anonimo')->defaul(false);
            $table->integer('pontos');
            $table->timestamps();
            $table->foreign('partida_id')->references('id')->on('partidas')->onDelete('CASCADE');
            $table->foreign('equipe_id')->references('id')->on('equipes')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidas_equipes');
    }
}
