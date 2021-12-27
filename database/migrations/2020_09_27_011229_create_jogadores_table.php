<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partida_jogadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('partida_id');
            $table->string('jogador');
            $table->integer('equipe');
            $table->integer('rodada_partida')->default(1);
            $table->boolean('anonimo')->defaul(true);
            $table->integer('pontos');
            $table->timestamps();
            $table->foreign('partida_id')->references('id')->on('partidas')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partida_jogadores');
    }
}
